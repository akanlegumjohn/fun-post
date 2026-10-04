# devJokes ⚡ — My Laravel Mastery Journey

> **Goal:** Master Laravel backend architecture from the ground up to become a fully capable full-stack engineer alongside my Next.js experience.  
> **Project:** `devJokes` — A developer jokes, puns, and tech humor sharing platform.  
> **Commitment:** 2 hours/day (Tuesday to Thursday) | 6 hours/week | 12 weeks (~72 hours total)  
> **Primary Source:** [Laracasts: Laravel From Scratch](https://laracasts.com/series/laravel-from-scratch-2026) + Official Laravel Docs  
> **Testing Suite:** PHPUnit

---

## ⚡ Daily 2-Hour Breakdown (Code > Bureaucracy)

Spend **85%+ of your time coding and testing**, not writing essays:

| Phase                | Time       | Action                                                                                                                                                               |
| :------------------- | :--------- | :------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **1. Watch & Grasp** | **25 min** | Watch 1–2 Laracasts episodes at 1.25x. Understand _what_ problem Laravel solves.                                                                                     |
| **2. Build & Prove** | **85 min** | Translate the concept to `devJokes` (e.g. _Jobs &rarr; Dev Jokes_). Write the code and a **PHPUnit test** proving it works (`php artisan test`). Format with Pint.   |
| **3. Quick Log**     | **10 min** | Jot down 4 quick bullet points in the log below, commit, and push.                                                                                                   |

---

## 🛠️ Developer Toolkit & Quick Reference

### Running the App & Tests

```bash
# Start local development server
composer run dev

# Run all PHPUnit tests
php artisan test

# Run a specific test file or filter by method
php artisan test tests/Feature/JokeTest.php
php artisan test --filter=test_user_can_create_joke

# Format code before committing
vendor/bin/pint --dirty --format agent
```

### Essential Artisan Commands

```bash
php artisan make:controller JokeController --resource   # RESTful resource controller
php artisan make:model Joke -mfs                         # Model with Migration, Factory & Seeder
php artisan make:request StoreJokeRequest               # Form Request with validation
php artisan make:policy JokePolicy --model=Joke         # Authorization Policy
php artisan make:test JokeTest                          # Feature test (PHPUnit)
php artisan make:test JokeUnitTest --unit               # Unit test (PHPUnit)
php artisan route:list                                  # Inspect registered routes
php artisan tinker                                      # Interactive REPL
```

---

## 📋 Daily Learning Log

> _Copy the 5-minute template from the bottom, paste it directly below this line, and fill it in._

### 2026-09-29 — Session 0: Architecture Baseline & PHPUnit Setup

- **Laracasts / Docs Ref:** Setup, Testing Architecture & PHPUnit
- **Concept & Next.js Model:** Laravel separates Unit tests (plain PHP objects) from Feature tests (boots the full framework + in-memory database). Unlike Next.js where API testing often needs mocks or Playwright, Laravel tests real HTTP requests against an in-memory SQLite database via `$this->get(...)`.
- **What I Built in FunPost:**
    - Switched testing framework from Pest to PHPUnit (`composer.json`, `phpunit/phpunit`).
    - Converted `tests/Feature/ExampleTest.php` and `tests/Unit/ExampleTest.php` to standard PHPUnit test classes.
    - Untracked generated agent folders (`.claude`, `.factory`) from git to keep commit history clean.
- **PHPUnit Proof:** `php artisan test` &rarr; 2 passed (Unit & Feature example tests).
- **Gotcha / Quick Note:** Git keeps tracking files even after adding them to `.gitignore` if they were already committed; use `git rm -r --cached <dir>` to untrack them cleanly.

### 2026-09-30 — Session 1: Blade Components, Layouts & Props

- **Laracasts Ref:** Blade component architecture, `<x-layout>`, `$slot`, passing props.
- **Concept & Next.js Model:** `<x-component>` is Blade's JSX equivalent. `{{ $slot }}` behaves identically to React's `{children}`, and passing `:prop="$var"` acts just like `prop={var}` without needing manual `import` statements.
- **What I Built in FunPost:**
    - Built reusable `<x-layout>` component (`resources/views/components/layout.blade.php`).
    - Created `<x-post-form>` component for joke/post creation (`resources/views/components/post-form.blade.php`).
    - Created `resources/views/faq.blade.php` wrapped in `<x-layout>`.
- **PHPUnit Proof:** `php artisan test` &rarr; Passed.
- **Gotcha / Quick Note:** The `x-` prefix tells Blade's compiler to look inside `resources/views/components/` rather than treating it as a standard HTML tag.

### 1st Oct. 2026 — Views, Data Passing, Query Params, Forms & Session Storage

- **Laracasts Ref:** Views & Blade, passing data arrays to views, reading query parameters (`request()`), HTML form handling, `@csrf` protection, POST routes, and Laravel session storage (`session()->push()`, `session()->get()`).
- **Concept & Next.js Model:**
    - _Data Passing & Query Params:_ Passing data via `return view('home', ['posts' => $posts])` is the direct equivalent of returning props in a Next.js Server Component page. The array keys become variables in Blade (`$posts`). Reading URL queries with `request('search')` mirrors `searchParams.search`.
    - _Forms & Sessions:_ Standard HTML forms submit POST requests to server endpoints. To prevent CSRF attacks, Laravel enforces `@csrf` tokens. Instead of client state, Laravel stores transient state across redirects in server-side session arrays (`session()->push('post', $post)`), persisting user submissions before we introduce a database.
- **What I Built in FunPost:**
    - Created `home.blade.php`: used `@dump()` to inspect data, `@foreach` to iterate over posts, and `@if` conditionals for search status and empty states.
    - Added clean static routing with `Route::view('/faq', 'faq')` for the FAQ page.
    - Upgraded `<x-post-form>`: added `@csrf` and field `name` attributes (`name="title"`, `name="content"`).
    - Created `Route::post('/posts')` to receive form data via `request()` and push new jokes into session storage with `session()->push('post', $post)`.
    - In `Route::get('/')`, retrieved session posts via `session()->get('post', [])`, reversed them with `array_reverse()` to show newest jokes first, and displayed them dynamically.
- **PHPUnit Proof:** `php artisan test` &rarr; 5 passed (`PostTest::test_user_can_view_home_page`, `test_user_can_submit_joke_to_session`, `test_user_can_view_faq_page`).
- **Gotchas / Quick Notes:**
    - Use `Route::view('/path', 'view')` when a page is static and doesn't need logic.
    - Forms without `@csrf` immediately fail with `419 Page Expired`.
    - Input elements must have a `name="..."` attribute (not just `id`) for the browser to include their values in the POST request body.
    - In Blade, associative array keys use bracket syntax (`$user['name']`), whereas Eloquent models will use arrow syntax (`$post->title`).

### 2nd Oct. 2026 — Database Migrations, Eloquent Models & Domain Pivot to `devJokes`

- **Laracasts Ref:** Migrations as database version control (`make:migration`, `migrate`, `migrate:rollback`), `up()` vs `down()` schema lifecycles, altering existing tables, migration squashing/skipping, and introductory Eloquent ORM.
- **Concept & Next.js Model:**
    - _Migrations & Active Record:_ Laravel migrations are equivalent to Prisma or Drizzle migration histories (`prisma migrate dev`). `up()` defines schema changes (DDL) and `down()` defines their rollback. The Eloquent Model (`Joke`) represents the `jokes` table, replacing Prisma client queries with clean Active Record methods (`Joke::all()`, `Joke::create()`).
    - _Domain Alignment:_ Domain terminology should match everywhere: Database table (`jokes`), Eloquent Model (`Joke`), Routes (`/jokes`, `/jokes/{id}`), Views (`jokes.index`, `jokes.show`), Components (`<x-joke-form>`), and Test Suites (`JokeTest`).
- **What I Built in devJokes:**
    - **Domain Pivot to `devJokes`:** Shifted application identity from generic "FunPost" to a dedicated developer jokes and coding humor platform: **`devJokes`**.
    - Created initial migration `create_jokes_table` (`id`, `timestamps`, `title`, `content`).
    - Created second migration `add_joke_owner_to_jokes_table` (`joke_owner` nullable column with `dropColumn` rollback in `down()`).
    - Created `App\Models\Joke` model with mass-assignment protection (`protected $fillable = ['title', 'content', 'joke_owner']`).
    - Refactored `routes/web.php` from session storage to true database persistence using `Joke::latest()->get()` and `Joke::create()`.
    - Added single joke permalink route `GET /jokes/{id}` using `Joke::findOrFail($id)`.
    - Reorganized views to standard RESTful conventions: `resources/views/jokes/index.blade.php` and `resources/views/jokes/show.blade.php`.
    - Created `<x-joke-form>` component posting to `POST /jokes`.
    - Updated navigation branding, logo (`devJokes`), and FAQ content.
- **PHPUnit Proof:** `php artisan test` &rarr; 6 passed, 14 assertions (`JokeTest::test_user_can_view_home_page`, `test_user_can_create_joke_in_database`, `test_user_can_view_single_joke`, `test_user_can_view_faq_page`).
- **Demo / Walkthrough:**

  [![▶️ Click to Watch Demo: Form Handling & Database Persistence](docs/recordings/demo-2026-10-02-thumb.png)](docs/recordings/demo-2026-10-02.mp4)

  > 🎥 **[▶️ Click here to play video (MP4)](docs/recordings/demo-2026-10-02.mp4)** &bull; *(also available in [.MOV format](docs/recordings/demo-2026-10-02.mov))*

- **Gotchas / Quick Notes:**
  - When renaming models/tables, the change must ripple through all layers: migrations, model class, route endpoints, view file locations, blade loops, and form actions.
  - When running tests with an in-memory database, add `use RefreshDatabase;` to your test classes so migrations run automatically in the test environment.
  - Eloquent prevents mass-assignment vulnerabilities by default; you must declare allowed fields in `protected $fillable = [...]` before calling `Joke::create(...)`.

### 4th Oct. 2026 — Full CRUD: Edit, Update, Delete & Method Spoofing

- **Laracasts Ref:** RESTful resource actions, updating database records (`PUT`/`PATCH`), deleting records (`DELETE`), method spoofing with `@method`, and debugging Blade components.
- **Concept & Next.js Model:**
    - _HTTP Method Spoofing:_ HTML forms only support `GET` and `POST`. In Next.js/React, you trigger `fetch('/api/jokes/1', { method: 'PUT' | 'DELETE' })` with JavaScript. In server-rendered Laravel Blade, you submit a standard `POST` form containing `@method('PUT')` or `@method('DELETE')`, which injects a hidden `_method` field that Laravel's router intercepts.
    - _RESTful Update & Delete Conventions:_ Show edit form via `GET /jokes/{id}/edit`, submit updates to `PUT /jokes/{id}`, and trigger deletions via `DELETE /jokes/{id}` with redirect flows.
- **What I Built in devJokes:**
    - Created edit page view [`resources/views/jokes/edit.blade.php`](resources/views/jokes/edit.blade.php) wrapped in `<x-layout>`.
    - Upgraded `<x-joke-form>` to support both creation (`type="new"`) and editing (`type="edit"`), binding existing values with `old('title', $joke->title)` and `@method('PUT')`.
    - Added `GET /jokes/{id}/edit`, `PUT /jokes/{id}`, and `DELETE /jokes/{id}` routes in [`routes/web.php`](routes/web.php) with mass-update (`$joke->update(...)`) and deletion (`$joke->delete()`).
    - Added Edit and Delete action controls directly to single joke detail view [`resources/views/jokes/show.blade.php`](resources/views/jokes/show.blade.php) with browser confirmation prompts.
- **PHPUnit Proof:** `php artisan test` &rarr; 9 passed, 26 assertions (`test_user_can_view_edit_joke_page`, `test_user_can_update_joke_in_database`, `test_user_can_delete_joke_from_database`).
- **Demo / Walkthrough:**

  [![▶️ Click to Watch Demo: Full CRUD Operations (Edit & Delete)](docs/recordings/demo-2026-10-04-crud-thumb.png)](docs/recordings/demo-2026-10-04-crud.mp4)

  > 🎥 **[▶️ Click here to play video (MP4)](docs/recordings/demo-2026-10-04-crud.mp4)** &bull; *(also available in [.MOV format](docs/recordings/demo-2026-10-04-crud.mov))*

- **Gotchas / Quick Notes:**
    - In Blade components, pass dynamic variables using colon syntax (`:joke="$joke"`), not React/JSX syntax (`joke={$joke}`).
    - HTML `<textarea>` does not have a `value="..."` attribute; content must be placed between the tags: `<textarea>{{ $value }}</textarea>`.
    - Array keys in `@props` must be quoted strings (e.g., `'endpoint' => null`), otherwise PHP treats barewords as undefined global constants.

<!-- INSERT NEXT DAILY ENTRY HERE -->


---

## 🗓️ 3-Month Mastery Roadmap (devJokes Milestones)

### Month 1: Core Architecture, CRUD & TDD Foundations

- [ ] **Week 1: Setup, Routing, & The HTTP Lifecycle**
    - [ ] Session 1 (Tue): Project structure, Artisan CLI, `routes/web.php` & `routes/api.php`, route parameters, named routes.
    - [ ] Session 2 (Wed): Resource Controllers (`JokeController`), returning views & JSON responses.
    - [ ] Session 3 (Thu): PHPUnit Feature testing basics: asserting HTTP status, view contents, and redirect headers.
- [ ] **Week 2: Database Schema, Migrations & Eloquent ORM**
    - [ ] Session 4 (Tue): Database migrations, schema constraints (`jokes` table with foreign key `user_id`).
    - [ ] Session 5 (Wed): Eloquent Model conventions, `$fillable` mass assignment protection, basic queries.
    - [ ] Session 6 (Thu): Model Factories & Database Seeders with Faker (`JokeFactory`).
- [ ] **Week 3: Validation, Form Requests & Error Handling**
    - [ ] Session 7 (Tue): Controller validation rules, error bags, status codes.
    - [ ] Session 8 (Wed): Custom Form Requests (`StoreJokeRequest`, `UpdateJokeRequest`) isolating validation from controllers.
    - [ ] Session 9 (Thu): PHPUnit tests asserting 422 Unprocessable Content and session validation errors.
- [ ] **Week 4: Authentication & User Scoping**
    - [ ] Session 10 (Tue): Laravel Authentication (Breeze / session auth flow).
    - [ ] Session 11 (Wed): Associating jokes with the authenticated user (`$request->user()->jokes()->create(...)`).
    - [ ] Session 12 (Thu): **Month 1 Review:** Registered users can create and view their dev jokes with 100% PHPUnit coverage.

### Month 2: Relational Architecture, Interactions & Authorization

- [ ] **Week 5: One-to-Many Relationships (Comments System)**
    - [ ] Session 13 (Tue): Migration & Model for `comments` (`Joke hasMany Comments`, `Comment belongsTo User`).
    - [ ] Session 14 (Wed): Nested resource controllers for adding and reading comments on jokes.
    - [ ] Session 15 (Thu): PHPUnit tests for comment creation and relationship integrity.
- [ ] **Week 6: Polymorphic Relations (Likes System)**
    - [ ] Session 16 (Tue): Polymorphic database design (`likeable_id`, `likeable_type`) so users can like jokes or comments.
    - [ ] Session 17 (Wed): Idempotent toggle-like action (like / unlike).
    - [ ] Session 18 (Thu): PHPUnit tests verifying that duplicate likes cannot be created.
- [ ] **Week 7: Self-Referential Many-to-Many (Followers & Feed)**
    - [ ] Session 19 (Tue): Pivot table `follows` (`follower_id`, `following_id`).
    - [ ] Session 20 (Wed): Generating the personalized Feed query (jokes from followed creators).
    - [ ] Session 21 (Thu): Solving the N+1 query problem: eager loading (`with()`) and `withCount(['likes', 'comments'])`.
- [ ] **Week 8: Authorization (Gates & Policies)**
    - [ ] Session 22 (Tue): Laravel Gates vs. Policies (`php artisan make:policy JokePolicy`).
    - [ ] Session 23 (Wed): Authorizing edit/delete actions (preventing users from editing someone else's joke).
    - [ ] Session 24 (Thu): **Month 2 Review:** Full social interactions (likes, comments, follows) secured with PHPUnit policy tests.

### Month 3: Production Backend, Files, Queues & Full-Stack API

- [ ] **Week 9: Media Handling & File Storage**
    - [ ] Session 25 (Tue): Storage disks (`config/filesystems.php`, `public` disk, `storage:link`).
    - [ ] Session 26 (Wed): Meme / image uploads with size and MIME validation.
    - [ ] Session 27 (Thu): PHPUnit tests using `Storage::fake('public')` and `UploadedFile::fake()->image()`.
- [ ] **Week 10: Events, Listeners & Notifications**
    - [ ] Session 28 (Tue): Event-Driven architecture (`JokeLiked`, `UserFollowed`).
    - [ ] Session 29 (Wed): Database and in-app notifications.
    - [ ] Session 30 (Thu): PHPUnit testing events & notifications with `Event::fake()` and `Notification::fake()`.
- [ ] **Week 11: Background Jobs & Queues**
    - [ ] Session 31 (Tue): Queue driver configuration and creating background jobs (`php artisan make:job`).
    - [ ] Session 32 (Wed): Moving heavy tasks (e.g., thumbnail generation, weekly digest emails) to background queues.
    - [ ] Session 33 (Thu): PHPUnit tests with `Queue::fake()`.
- [ ] **Week 12: API Resources & End-to-End Delivery**
    - [ ] Session 34 (Tue): Eloquent API Resources (`JokeResource`, `CommentResource`) for clean JSON transformation.
    - [ ] Session 35 (Wed): Sanctum token authentication for connecting to Next.js or external clients.
    - [ ] Session 36 (Thu): **Final Milestone:** Full test suite run (`php artisan test`), code styling (`pint`), final retrospective.

---

## 📝 5-Minute Daily Log Template

> Copy and paste this at the top of the "Daily Learning Log" section after each session. Keep it concise—just the facts and code.

```markdown
### [YYYY-MM-DD] — Session X: [Feature / Topic]

- **Laracasts Ref:** [Ep # or Topic]
- **Concept & Next.js Model:** [1-2 sentences on how it works / compares to Next.js]
- **What I Built in devJokes:** [1-2 bullets on models, migrations, or endpoints created]
- **PHPUnit Proof:** [Test file or method that passed]
- **Gotcha / Quick Note:** [1 sentence if an error or edge case tripped you up]
```
