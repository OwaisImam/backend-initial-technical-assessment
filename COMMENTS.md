# Comments

## 1. Routing logic

I have change the routiong logic becuase It looks clearner, easy to handle and test, and for reusablity.

## 2. Completing the form

I have linked the form action to the post route, and handle the coming data from the request with the exceptional handling with db transaction.

## 3. Separating the submitter information from the `GuestbookEntry`

I have seperate the submitter information from the guestbook model, by jsut adding the relation with the users table, and also update the migrations file, and view file. 
please run the command php artisan migrate:fresh and php artisan db:seed again.


## 4. Update an entry

make an api for update the record for the authenticated user only. user can update their record respectively.

## 5. Generate an hourly report

I have make the job for generating report and sechedule it to hourly in kernel.php file. and also change the queue connection to database in .env file.

## 6. React to an entry being deleted

I have made the event for the associated task with the delete api. whenever the delete api hits, the event will trigger and all the linked jobs or task will perform on queue.
