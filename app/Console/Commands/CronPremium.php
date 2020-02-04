<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Modules\Content\Entities\ContentMeta;
use Modules\Content\Entities\Comment;

class CronPremium extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:removepremium';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
//        $comment= new Comment;
//        $comment-> content='1';
//        $comment-> type='1';
//        $comment-> author_id=1;
//        $comment-> author_ip='1';
//        $comment-> author_name='1';
//        $comment-> author_email='1';
//        $comment-> author_avatar='1';
//        $comment-> author_user_agent='1';
//        $comment-> commentable_type='1';
//        $comment-> commentable_id=1;
//        $comment->save();
        $premiums=ContentMeta::where('key','=','publishVerifiedEnd')->where('value', '<', Carbon::now())
            ->get();
        if(count($premiums)>0){
            foreach ($premiums as $data){
                $update = ContentMeta::where('key','=','publishVerified')->where('content_id', '=', $data->content_id)->firstOrFail();
                $update->value=0;
                $update->save();
                $delete = ContentMeta::find($data->id);
                $delete->delete();
            }
        }
    }
}
