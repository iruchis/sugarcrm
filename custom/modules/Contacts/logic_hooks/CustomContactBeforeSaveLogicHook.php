<?php

class CustomContactBeforeSaveLogicHook
{
    public function beforeSave($bean, $event, $arguments)
    {
        // 1. Increment counter_c by 1
        if (empty($bean->counter_c)) {
            $bean->counter_c = 1;  // If the record is new, set counter_c = 1
        } else {
            $bean->counter_c++;  // If the record already exists, increment counter_c by 1
        }

        // 2. Set epoch_time_c to the current epoch timestamp
        $bean->epoch_time_c = time();  // Current epoch timestamp

        // 3. Set epoch_time_utc_c to the current UTC timestamp in the format YYYY-MM-DD HH:MM:SS.UUUU
        $utcTimestamp = gmdate("Y-m-d H:i:s.u");  // Generate UTC timestamp
        $bean->epoch_time_utc_c = $utcTimestamp;  // Store in the custom field
    }
}
