<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send notification every day if item available';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $items = DB::table('remind_me_items')
                    ->join('items', 'items.id', '=', 'remind_me_items.item_id')
                    ->select('items.*', 'remind_me_items.*')
                    ->get();
        foreach ($items as $item) {
            if ($item->quantity > 0) {
                $users = DB::table('remind_me_items')->where('item_id' , $item->id)
                            ->join('users', 'users.id', '=', 'remind_me_items.user_id')
                            ->pluck('users.email')->toArray();
                $body = 'item "'.$item->name.'" is available, you can order it now.';
                foreach ($users as $user) {
                    Mail ::send('auth.email',['body'=>$body], function($message) use ($user) {
                        $message->from('tt4174117@gmail.com','Ghyari');
                        $message->to($user,'You')
                                ->subject('Order Available Notification');
                    });
                }
                DB::table('remind_me_items')->where('item_id' , $item->id)->delete();
            }
        }
    }
}
