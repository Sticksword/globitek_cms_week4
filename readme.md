
# Project 4 - Globitek Authentication and Login Throttling

Time spent: 10 hours spent in total

## User Stories

The following **required** functionality is completed:

1\. [X]  Required: Test for initial vulnerabilities

2\. [X]  Required: Configure sessions
  * [X]  Required: Only allow session IDs to come from cookies
  * [X]  Required: Expire after one day
  * [X]  Required: Use cookies which are marked as HttpOnly

3\. [X]  Required: Complete Login page.
  * [X]  Required: Show an error message when username is not found.
  * [X]  Required: Show an error message when username is found but password does not match.
  * [X]  Required: After login, store user ID in session data.
  * [X]  Required: After login, store user last login time in session data.
  * [X]  Required: Regenerate the session ID at the appropriate point.

4\. [X]  Required: Require login to access staff area pages.
  * [X]  Required: Add a login requirement to *almost all* staff area pages.
  * [X]  Required: Write code for `last_login_is_recent()`.

5\. [X]  Required: Complete Logout page.
  * [X]  Required: Add code to destroy the user's session file after logging out.

6\. [X]  Required: Add CSRF protections to the state forms.
  * [X]  Required: Create a CSRF token.
  * [X]  Required: Add CSRF tokens to forms.
  * [X]  Required: Compare tokens against the stored version of the token.
  * [X]  Required: Only process forms data sent by POST requests.
  * [X]  Required: Confirm request referer is from the same domain as the host.
  * [X]  Required: Store the CSRF token in the user's session.
  * [X]  Required: Add the same CSRF token to the login form as a hidden input.
  * [X]  Required: When submitted, confirm that session and form tokens match.
  * [X]  Required: If tokens do not match, show an error message.
  * [X]  Required: Make sure that a logged-in user can use pages as expected.

7\. [X]  Required: Ensure the application is not vulnerable to XSS attacks.

8\. [X]  Required: Ensure the application is not vulnerable to SQL Injection attacks.

9\. [X]  Required: Run all tests from Objective 1 again and confirm that your application is no longer vulnerable to any test.


The following advanced user stories are optional:

* [X]  Bonus Objective 1: Identify security flaw in Objective #4 (requiring login on staff pages)
  * [X]  Identify the security principal not being followed.
  * [X]  Write a short description of how the code could be modified to be more secure.

  I think objective 4 breaks the 3rd fundamental principle which is `Simple is more secure.` Having to run `require_login()` on every page makes it very difficult to maintain and human engineers could often let one or two pages slip by without the check. If that occurs, it's only a matter of time before a l33t hacker accesses the page that slipped by. One solution could be to add some require login middleware on top of the url paths/endpoints so that you only have to add `require_login()` once in the code. This follows the DRY principle as well.


* [X] Bonus Objective 2: Add CSRF protections to all forms in the staff directory

* [X]  Bonus Objective 3: CSRF tokens only valid for 10 minutes.

* [X]  Bonus Objective 4: Sessions are valid only if user-agent string matches previous value.

* [X]  Advanced Objective: Set/Get Signed-Encrypted Cookie (not fully sure if implemented correctly, when it says encrypt cookie, it means encrypt the sesion data right? the task doesn't say specifically where to encrypt/decrypt)
  * [X]  Create "public/set\_secret\_cookie.php".
  * [X]  Create "public/get\_secret\_cookie.php".
  * [X]  Encrypt and sign cookie before storing.
  * [X]  Verify cookie is signed correctly or show error message.
  * [X]  Decrypt cookie.

## Video Walkthrough

Here's a walkthrough of implemented user stories:

<img src='http://imgur.com/a/75idH' title='Video Walkthrough' width='' alt='Video Walkthrough' />

GIF created with [LiceCap](http://www.cockos.com/licecap/).
