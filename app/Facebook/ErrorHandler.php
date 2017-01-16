<?php

namespace App\Facebook;

use App\Error;
use App\FbSessions;
use Illuminate\Support\Facades\DB;

class ErrorHandler 
{
    public function createError($sessionId , $code, $message , $type = 0)
    {
        DB::beginTransaction();
        try{
            $error = new Error();
            $error->sessionId = $sessionId;
            $error->code = $code;
            $error->message = $message;

            $error->save();

            $status = $type == 0 ? \App\SessionStatus::CRAWLERERROR : \App\SessionStatus::PARSERERROR;

            $session = FbSessions::findOrFail($sessionId);
            $session->status = $status;
            $session->timestamps = false;
            $session->save();

            DB::commit();

            return true;
        } 
        catch (\Exception $e)
        {
            print_r($e->getMessage());
            DB::rollback();
        }
        
        return false;
        
    }
}

