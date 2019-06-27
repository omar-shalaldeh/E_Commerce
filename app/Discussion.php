<?php

namespace L_forum;



class Discussion extends Model
{
    protected $fillable = ['contents', 'title', 'channel_id', 'slug', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    public function scopeFilterByChannel($builder)
    {
        if (request()->query('channel'))
        {

            $channel=Channel::where('slug',request()->query('channel'))->first();


            if ($channel)
            {

                return $builder->where('channel_id',$channel->id);

            }
            return $builder;

        }



        return $builder;
    }

    public function markAsBestReply(Reply $reply)
    {

        $this->update([
            'reply_id'=>$reply->id
        ]);
    }
}