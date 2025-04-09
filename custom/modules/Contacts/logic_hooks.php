<?php

$hook_array['before_save'][] = array(
    1, // Priority (1 is the highest)
    'Custom Before Save Logic Hook', // Hook label
    'custom/modules/Contacts/logic_hooks/CustomContactBeforeSaveLogicHook.php', // Path to the custom logic hook handler
    'CustomContactBeforeSaveLogicHook', // Class name
    'beforeSave' // Method to run
);
