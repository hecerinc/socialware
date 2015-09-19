## Requerimientos para la aplicación de AMA

#### Key

| Key | Meaning | Type |
| --- | ------- | ---- | 
|  SF | Socioformador | Super admin 
|  ZC | Coordinador de zona | Admin
| CRUD | Create, Read, Update, Delete | 

### External site

**Assume unauthorized/unidentified user**

- [x] The user shall be able to access any content on the external site
- [ ] The user shall be able to consult information about the project
- [ ] The user shall be able to play an online game (to be defined)
- [ ] The user shall be able to consume video content as uploaded by the SF
- [ ] The user shall be able to consume news content as generated and uploaded by the SF
- [ ] The user shall be able to login from the external site
- [ ] Only the SF shall be able to upload/change external site content (including videos, news & about us info)

### Internal site

**Assume identified & authorised user**

#### STUDENTS

- [ ] A student shall be able to browse & open (consume) all content per session and per topic
	- Description, videos, and associated content
- [ ] A student shall be able to view his/her attendance report
- [ ] A student shall be able to download content for further revision (PDFs & non-media content)

#### PARENTS

- [ ] A parent shall be able to view his child's grades & attendance report
- [ ] A parent shall be able to consume the content & session videos for his child's zone per session & topic

#### TUTORS

- [ ] A tutor shall be able to access his zone's content
- [ ] A tutor shall be able to register his/her hours/assistance
- [ ] A tutor shall be able to view his/her own assistance chart, grades, & feeback (as provided by the SF or ZC)
- [ ] A tutor shall be able to consult his/her zone's full alumni list
- [ ] A tutor shall be able to consult the assistance of his zone's students
- [ ] A tutor shall be able to search for a given student in his zone by name
- [ ] A tutor shall be able to view his/her student's assitance & grades
- [ ] A tutor shall be able to view information for his/her Zone.

#### ADMINS

- [ ] The SF shall be able to CRUD users & must assign a role.
- [ ] The SF & ZC shall be able to CRUD Students
- [ ] The SF & ZC shall be able to provide weekly feedback to each Tutor/ZC (text)
- [ ] The SF & ZC shall be able to grade students' and tutors' performance (scale of 1-10) // This might conflict with grading by Tutor.
- [ ] The SF shall be able to define basic & generic grading criteria to be applicable to all zones
- [ ] The SF shall be able to CRUD grading criteria as needed per zone. These will vary only for students
- [ ] The SF shall be able to CRUD Zones
- [ ] The SF shall be able to CRUD Horarios (per Zone)
- [ ] The SF & ZC shall be able to control visibility of Sessions to Parents & Students
- [ ] The Tutor shall be able to grade his students & provide written feedback per Session // WITH THIS (see comment above)

###### Zones

- [ ] Zones shall have `n` tutors assigned & `1` ZC where `n >= 0`
- [ ] ZC shall only be able to access information pertaining to his/her Zone(s).
- [ ] The system shall generate a schedule spanning the entire week of all the time slots (Horarios) in all the zones so as to provide an 'overview' of all the activities 
- [ ] This schedule shall be accesible only to the SF
- [ ] The ZC shall be able to view a similar schedule but only for his/her Zone(s)
- [ ] The ZC shall be able to view & edit information regarding his/her assigned Zone(s)

###### Sessions

- [ ] The user shall be able to consume content per Session or Topic.
- [ ] The ZC shall be able to upload & delete session videos to his/her Zone(s).
- [ ] Session videos shall be assigned to a Session.
- [ ] The SF & ZC shall be able to CRUD Sessions & assign Topics to it.

###### Subjects & Topics

- [ ] Each Zone shall have 2 mandatory subject divisions (Math & Spanish)
- [ ] The SF (and only he) shall be able to CRUD Topics & Subjects. Applies to all Zones. (Bulk Excel spreadsheet import)
- [ ] The SF shall be able to edit Topics per Zone.
- [ ] Tutors, ZC & SF shall all be able to upload videos of didactic content per Topic.
- [ ] SF, ZC & Tutors can upload & download content to a Topic pertaining to a Subject.
- [ ] Tutors shall only be able to edit/remove their own content.
- [ ] The SF or ZC will have to approve any content uploaded by Tutors before it is publicly available to Students/Parents.

###### Other

- [ ] The SF shall be able to broadcast e-mail per zone or to all Tutors/ZC.
- [ ] ***** The system shall provide an announcements section where the SF or ZC can post announcements (delegate to FB)


--------------------------------------------------------------------------------------

### Dinámicas

`Dynamics = dynamicas // (not the real translation)`

- [ ] The system shall provide a dedicated section for Dynamics.
- [ ] The SF shall bea ble to CRUD Dynamics
- [ ] The Dynamics shall have a description & associated content attached.
- [ ] Dynamics shall have multiple tags and shall be assigned to a Subject or "Generic"
- [ ] The SF & ZC shall be able to view Dyanmics & search by name, Subject, or tags.
- [ ] The SF shall be able to assign a Dynamic to an Horario for a given Session.
- [ ] If no Dynamic is suitable, the SF shall be able to request a Tutor from that Zone to generate one.
- [ ] Upon request of a Dynamic, the SF shall specificy for which Session and for which Topic.
- [ ] An e-mail alert shall be generated & sent to all the Zone's Tutors.
- [ ] When requested, a tutor shall be able to upload a Dynamic. It shall receive a status of PA (Pending Approval) immediately after upload
- [ ] The Dyanmic shall not be made available as part of the general pool pending approval from the SF
- [ ] The SF shall be notified via e-mail when a Tutor has uploaded a Dynamic.
- [ ] Only one Tutor per Zone can upload a Dynamic at a time. If another Tutor has already started a Submission, the other Tutors shall see the status & be able to view the Dynamic but shall not be able to start a new Submission.
- [ ] The other Tutors shall be notified via e-mail upon approval or declination of Dynamic.
- [ ] The SF shall be able to view all the PA Dynamics in a single place.
- [ ] The SF shall be able to review & approve or reject a Dynamic uploaded by a Tutor.
	- If rejected, the SF will be able to provide written feedback for the Tutor.
		- The Tutor shall then be prompted to start a new Submission (any Tutor can start it at this point)
- [ ] A tutor can view, edit & delete his own Submissions before approval.

-----------------------------------------------------------------



### Other Non-Functional Requirements

- [ ] The system shall only show first names to parents & students, except for the student's own name (and a parent's child).
- [ ] Every user shall be able to change his/her password.
- [ ] The SF shall be able to assign a password for every user.