<?php

class CustomContactResaveScheduler extends SchedulerJob
{
    public function run($params = array())
    {
        // Get all Contacts
        $contactBean = BeanFactory::newBean('Contacts');
        $contactList = $contactBean->get_full_list("", "contacts.deleted = 0");

        foreach ($contactList as $contact) {
            // Skip resaving if the contact has no data to update
            if (!$contact->isNew() && $contact->fetched_row['date_modified'] == $contact->date_modified) {
                continue;
            }

            // Perform the resave logic here
            $contact->save(false); // Prevent saving the 'date_modified' field update.
        }
    }

    // Define when this job should run, e.g., daily at a certain time
    public function getNextRunDate()
    {
        // Get the current time, incrementing by 24 hours (run every day)
        $nextRun = time() + (24 * 60 * 60);
        return date("Y-m-d H:i:s", $nextRun);
    }
}
