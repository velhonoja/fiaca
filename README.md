# fiaca
Field Service Area Catalog

Task management software for coordinating various tasks between multiple users/workers/volunteers that apply to certain geographical area.

Features
- Manage different geographical areas
- Manage users and connect them to specific areas to perform a specific task 
- Manage task-types


Possible other features planned (open for discussion)
- Print area-information




Roadmap:
- define/discuss/choose core features for this software
- choose tools: PHP, latest CodeIgniter, MySQL, deployed to LAMP-stack
- design database tables
- create install -feature which creates database tables if not present (assumes that database is set up in application/config/database.php)
- create GRUD operations for users, areas and event_types (UserManager, AreaManager, EventTypeManager - controllers?)
- create GRUD gui for events
- all other stuff

Work coordination:
- Data transclusion/transfer from old system: (reimakarvonen)
- Finish event_type controller/model/view, create default event types (velhonoja)

