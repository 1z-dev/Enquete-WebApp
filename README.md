# Enquete-WebApp

> A web application meant to pull more people into giving their opinion on local authority decisions. School group project involving clients. <br><br>
> Concept: Little version of the player walks through supermarket (hence the albertheijn folder name) and the choice they make decides 
> whether the player goes left or right. When the enquete is completed, they end up in a specific isle of the supermarket. This makes the enquete fun to answer and allows the admins to gather enough data.


The application allows users/admins to:
- Vote whether they agree or disagree on planned actions of their local authority in a fun way.
- Add/edit/delete statements that appear in the enquete.
- Read statistics from other users.

## Tech Stack

**Backend**
- Laravel
- PHP

**Frontend**
- JavaScript
- HTML
- Tailwind CSS

**Database**
- SQLite

**Tools & Other Technologies**
- Git/GitHub (desktop/projects)
- Composer
- Herd
- Krita (for assets)

## My tasks and contributions
Since this was a group project, it might be nice to have some clarity on which features I was in charge of, for that, I added the relevant user stories I was given for this project:

- As a user, I can visually follow different paths based on my choices, making the process of sharing my opinion more engaging. 
- As a user, I can provide my opinion on various statements.
- As a user, I can elaborate on my opinion so that the admin understands why I agree or disagree.
- As a user, I can arrive at different locations (serving as a reward) depending on the route I’ve taken.

## Screenshots
I chose to use wireframe sketches because the final result visuals didn't reach wishes due to a lack of time.
| Enquête page | Result/Reward page |
|:---:|:---:|
| <img src="https://postimg.cc/PNStDWmv" alt="Choosing opinion screen" height="400"> | <img src="https://postimg.cc/629X2qqc" alt="Can of soup reward" height="400"> |

### Prerequisites

Make sure you have installed:
- PHP 8.5
- Composer
- Node.js and NPM

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/1z-dev/Enquete-WebApp
   ```

2. Navigate into the project directory:

   ```bash
   cd Enquete-WebApp
   ```

3. Install PHP dependencies:

   ```bash
   composer install
   ```

4. Install JavaScript dependencies:

   ```bash
   npm install
   ```

5. Create your environment file:

   ```bash
   cp .env.example .env
   ```

6. Generate the application key:

   ```bash
   php artisan key:generate
   ```

7. Configure your database in the `.env` file.

8. Run migrations:

   ```bash
   php artisan migrate
   ```

9. Start the development servers:

   ```bash
   php artisan serve
   ```

10. Add dummy statements (can be anything, just so everything works)

11. Open the application at the given localhost URL.

## What I Learned

- Writing game-like code with Javascript
- Creating proper documentation
- Connecting Javascript with a PHP backend

## Future Improvements

If I had more than 8 days to program my section of this project, I would've created better assets, and added more animations. The site isn't very visually interesting right now.
I also would've made the route system be more based on people's answers, rather than being mostly random, as well as added more comments inside the file (we didn't need them at the time and forgot).
On top of that, I would've added the points system, that rewards participation. A userstory I had to abandon because of the deadline.

## Author

**1z-dev**
