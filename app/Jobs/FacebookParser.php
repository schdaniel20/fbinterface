<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Cylex\Facebook\Parser\DataSource;
use Cylex\Facebook\Parser\Parser;
use Cylex\Facebook\Parser\DataTarget;
use App\Facebook\ErrorHandler;
use App\FbSessions;
use App\SessionStatus;

class FacebookParser implements ShouldQueue {

    use InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $source;
    protected $target;
    protected $sessionId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $sessionId, array $source, array $target) {
        $this->sessionId = $sessionId;
        $this->source = $source;
        $this->target = $target;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {

        $source = new DataSource($this->source, $this->sessionId);
        $target = new DataTarget($this->target, $this->sessionId);
        $parser = new Parser($this->sessionId);

        $target->init();
        $container = [];

        FbSessions::where('sessionId', $this->sessionId)
                ->update(['status' => SessionStatus::PARSERRUNNING]);

        while (1) {

            $source->getNext($container, 'id');

            if (count($container['ids']) == 0)
            {
                break;
            }

            foreach ($container['result'] as $res) {
                $parser->init($res);
                $store = $parser->parse($res);
                if ($store) {
                    $target->save($store);
                }
            }
        }

        FbSessions::where('sessionId', $this->sessionId)
                ->update(['status' => SessionStatus::PARSERFINISHED]);
    }

    public function failed(\Exception $exception) {
        $error = new ErrorHandler;
        $error->createError($this->sessionId, $exception->getCode(), $exception->getMessage(), 1);
    }

}
