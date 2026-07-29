# Video Brief Board for ownCloud

Video Brief Board is a small ownCloud Classic application for turning an early
video idea into a portable, reviewable brief. It adds a focused form to the
ownCloud navigation and stores each submission as a JSON file in the current
user's `Video Briefs` folder.

The form captures the subject and setting, intended motion, camera treatment,
duration, aspect ratio, production constraints, and review notes. The stored
JSON uses an explicit `video-brief-board/v1` schema marker, so a brief can be
reviewed in ownCloud, downloaded, versioned, or handed to another production
tool without being trapped in a proprietary editor.

## Why structured briefs help

A visual reference alone rarely explains which element should move, how the
camera should behave, or which details must remain stable. Separating those
decisions makes review more specific and reduces ambiguous feedback. The
application keeps planning files next to the source assets already stored in
ownCloud.

For teams exploring motion concepts after the brief is agreed, a
[browser-based AI video workflow](https://kling3ai.co/) can be one optional
prototyping step. The link is a planning reference only: this application does
not send ownCloud files or user data to that service and has no external API
dependency.

## Installation

1. Extract the release package into the ownCloud `apps` directory.
2. Ensure the directory is named `video_brief_board`.
3. Enable **Video Brief Board** from the ownCloud Apps administration page.
4. Open **Video Briefs** from the main navigation.

The application targets ownCloud Classic 10 and PHP 7.4 or newer. It does not
require a database migration, background job, command-line tool, or external
service.

## Data handling

Briefs are written only to the authenticated user's ownCloud storage. The app
creates a `Video Briefs` folder when needed and writes timestamped JSON files.
No content is transmitted outside the ownCloud instance. The external planning
reference opens only when a user chooses the link.

## License

AGPL-3.0-or-later.
