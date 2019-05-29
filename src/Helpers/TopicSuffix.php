<?php

namespace Kafka\SchemaRegistry\Helpers;

class TopicSuffix
{

    public static function getCleanedTopic($topic){
        
        if(!empty(getenv('KAFKA_TOPIC_SUFFIX'))){
            $topic = str_replace('_' . getenv('KAFKA_TOPIC_SUFFIX'), '', $topic);
        }

        return $topic;

    }

    public static function getSuffixedTopic($topic){
        
        if(is_array($topic)){
            $tArray = [];

            foreach($topic as $t){
                $tArray[] = $t . '_' . getenv('KAFKA_TOPIC_SUFFIX');
            }

            $topic = $tArray;
        }else{
            if(!empty(getenv('KAFKA_TOPIC_SUFFIX'))){
                $topic .= '_' . getenv('KAFKA_TOPIC_SUFFIX');
            }
        }
        
        return $topic;

    }
}