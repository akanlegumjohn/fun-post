# 🎭 FunPost — My Laravel Mastery Journey & Living Knowledge Base

> **Goal:** Master Laravel backend architecture from the ground up to become a fully capable full-stack engineer alongside my Next.js experience.  
> **Commitment:** 2 hours/day (Tuesday to Thursday) | 6 hours/week | 12 weeks (~72 hours total)  
> **Primary Source:** [Laracasts: Laravel From Scratch](https://laracasts.com/series/laravel-from-scratch-2026) + Official Laravel Docs  
> **Testing Suite:** PHPUnit  

---

## ⚡ Daily 2-Hour Breakdown (Code > Bureaucracy)

Spend **85%+ of your time coding and testing**, not writing essays:

| Phase | Time | Action |
| :--- | :--- | :--- |
| **1. Watch & Grasp** | **25 min** | Watch 1–2 Laracasts episodes at 1.25x. Understand *what* problem Laravel solves. |
| **2. Build & Prove** | **85 min** | Translate the concept to `fun-post` (e.g. *Jobs &rarr; Funny Posts*). Write the code and a **PHPUnit test** proving it works (`php artisan test`). Format with Pint. |
| **3. Quick Log** | **10 min** | Jot down 4 quick bullet points in the log below, commit, and push. |

---

## 🛠️ Developer Toolkit & Quick Reference

### Running the App & Tests
```bash
# Start local development server
composer run dev

# Run all PHPUnit tests
php artisan test

# Run a specific test file or filter by method
php artisan test tests/Feature/PostTest.php
php artisan test --filter=test_user_can_create_post

# Format code before committing
vendor/bin/pint --dirty --format agent
```

### Essential Artisan Commands
```bash
php artisan make:controller PostController --resource   # RESTful resource controller
php artisan make:model Post -mfs                         # Model with Migration, Factory & Seeder
php artisan make:request StorePostRequest               # Form Request with validation
php artisan make:policy PostPolicy --model=Post         # Authorization Policy
php artisan make:test PostTest                          # Feature test (PHPUnit)
php artisan make:test PostUnitTest --unit               # Unit test (PHPUnit)
php artisan route:list                                  # Inspect registered routes
php artisan tinker                                      # Interactive REPL
```

---

## 📋 Daily Learning Log

> *Copy the 5-minute template from the bottom, paste it directly below this line, and fill it in.*

### 2026-09-29 — Session 0: Architecture Baseline & PHPUnit Setup
- **Laracasts / Docs Ref:** Setup, Testing Architecture & PHPUnit
- **Concept & Next.js Model:** Laravel separates Unit tests (plain PHP objects) from Feature tests (boots the full framework + in-memory database). Unlike Next.js where API testing often needs mocks or Playwright, Laravel tests real HTTP requests against an in-memory SQLite database via `$this->get(...)`.
- **What I Built in FunPost:** 
  - Switched testing framework from Pest to PHPUnit (`composer.json`, `phpunit/phpunit`).
  - Converted `tests/Feature/ExampleTest.php` and `tests/Unit/ExampleTest.php` to standard PHPUnit test classes.
  - Untracked generated agent folders (`.claude`, `.factory`) from git to keep commit history clean.
- **PHPUnit Proof:** `php artisan test` &rarr; 2 passed (Unit & Feature example tests).
- **Gotcha / Quick Note:** Git keeps tracking files even after adding them to `.gitignore` if they were already committed; use `git rm -r --cached <dir>` to untrack them cleanly.

<!-- INSERT NEXT DAILY ENTRY HERE -->

---

## 🗓️ 3-Month Mastery Roadmap (FunPost Milestones)

### Month 1: Core Architecture, CRUD & TDD Foundations
- [ ] **Week 1: Setup, Routing, & The HTTP Lifecycle**
  - [ ] Session 1 (Tue): Project structure, Artisan CLI, `routes/web.php` & `routes/api.php`, route parameters, named routes.
  - [ ] Session 2 (Wed): Resource Controllers (`PostController`), returning views & JSON responses.
  - [ ] Session 3 (Thu): PHPUnit Feature testing basics: asserting HTTP status, view contents, and redirect headers.
- [ ] **Week 2: Database Schema, Migrations & Eloquent ORM**
  - [ ] Session 4 (Tue): Database migrations, schema constraints (`posts` table with foreign key `user_id`).
  - [ ] Session 5 (Wed): Eloquent Model conventions, `$fillable` mass assignment protection, basic queries.
  - [ ] Session 6 (Thu): Model Factories & Database Seeders with Faker (`PostFactory`).
- [ ] **Week 3: Validation, Form Requests & Error Handling**
  - [ ] Session 7 (Tue): Controller validation rules, error bags, status codes.
  - [ ] Session 8 (Wed): Custom Form Requests (`StorePostRequest`, `UpdatePostRequest`) isolating validation from controllers.
  - [ ] Session 9 (Thu): PHPUnit tests asserting 422 Unprocessable Content and session validation errors.
- [ ] **Week 4: Authentication & User Scoping**
  - [ ] Session 10 (Tue): Laravel Authentication (Breeze / session auth flow).
  - [ ] Session 11 (Wed): Associating posts with the authenticated user (`$request->user()->posts()->create(...)`).
  - [ ] Session 12 (Thu): **Month 1 Review:** Registered users can create and view their funny posts with 100% PHPUnit coverage.

### Month 2: Relational Architecture, Interactions & Authorization
- [ ] **Week 5: One-to-Many Relationships (Comments System)**
  - [ ] Session 13 (Tue): Migration & Model for `comments` (`Post hasMany Comments`, `Comment belongsTo User`).
  - [ ] Session 14 (Wed): Nested resource controllers for adding and reading comments on funny posts.
  - [ ] Session 15 (Thu): PHPUnit tests for comment creation and relationship integrity.
- [ ] **Week 6: Polymorphic Relations (Likes System)**
  - [ ] Session 16 (Tue): Polymorphic database design (`likeable_id`, `likeable_type`) so users can like posts or comments.
  - [ ] Session 17 (Wed): Idempotent toggle-like action (like / unlike).
  - [ ] Session 18 (Thu): PHPUnit tests verifying that duplicate likes cannot be created.
- [ ] **Week 7: Self-Referential Many-to-Many (Followers & Feed)**
  - [ ] Session 19 (Tue): Pivot table `follows` (`follower_id`, `following_id`).
  - [ ] Session 20 (Wed): Generating the personalized Feed query (posts from followed creators).
  - [ ] Session 21 (Thu): Solving the N+1 query problem: eager loading (`with()`) and `withCount(['likes', 'comments'])`.
- [ ] **Week 8: Authorization (Gates & Policies)**
  - [ ] Session 22 (Tue): Laravel Gates vs. Policies (`php artisan make:policy PostPolicy`).
  - [ ] Session 23 (Wed): Authorizing edit/delete actions (preventing users from editing someone else's post).
  - [ ] Session 24 (Thu): **Month 2 Review:** Full social interactions (likes, comments, follows) secured with PHPUnit policy tests.

### Month 3: Production Backend, Files, Queues & Full-Stack API
- [ ] **Week 9: Media Handling & File Storage**
  - [ ] Session 25 (Tue): Storage disks (`config/filesystems.php`, `public` disk, `storage:link`).
  - [ ] Session 26 (Wed): Meme / image uploads with size and MIME validation.
  - [ ] Session 27 (Thu): PHPUnit tests using `Storage::fake('public')` and `UploadedFile::fake()->image()`.
- [ ] **Week 10: Events, Listeners & Notifications**
  - [ ] Session 28 (Tue): Event-Driven architecture (`PostLiked`, `UserFollowed`).
  - [ ] Session 29 (Wed): Database and in-app notifications.
  - [ ] Session 30 (Thu): PHPUnit testing events & notifications with `Event::fake()` and `Notification::fake()`.
- [ ] **Week 11: Background Jobs & Queues**
  - [ ] Session 31 (Tue): Queue driver configuration and creating background jobs (`php artisan make:job`).
  - [ ] Session 32 (Wed): Moving heavy tasks (e.g., thumbnail generation, weekly digest emails) to background queues.
  - [ ] Session 33 (Thu): PHPUnit tests with `Queue::fake()`.
- [ ] **Week 12: API Resources & End-to-End Delivery**
  - [ ] Session 34 (Tue): Eloquent API Resources (`PostResource`, `CommentResource`) for clean JSON transformation.
  - [ ] Session 35 (Wed): Sanctum token authentication for connecting to Next.js or external clients.
  - [ ] Session 36 (Thu): **Final Milestone:** Full test suite run (`php artisan test`), code styling (`pint`), final retrospective.

---

## 📝 5-Minute Daily Log Template

> Copy and paste this at the top of the "Daily Learning Log" section after each session. Keep it concise—just the facts and code.

```markdown
### [YYYY-MM-DD] — Session X: [Feature / Topic]
- **Laracasts Ref:** [Ep # or Topic]
- **Concept & Next.js Model:** [1-2 sentences on how it works / compares to Next.js]
- **What I Built in FunPost:** [1-2 bullets on models, migrations, or endpoints created]
- **PHPUnit Proof:** [Test file or method that passed]
- **Gotcha / Quick Note:** [1 sentence if an error or edge case tripped you up]
```
