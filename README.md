# Indies Catalog

Full CRUD video game catalog with 32-hand picked under the radar games. Login functionality (must log in to insert/update/delete entries) and search functionality with search bar. This website uses **PHP, Bootstrap 4 and a modified version its [Dashboard Template](https://getbootstrap.com/docs/4.0/examples/dashboard/)**.

The catalog information is stored in a table in a MySQL database. The information collected for each game contains:
- Game Title
- Self-written description
- Developer
- Publisher
- Steam release date
- Canadian Steam price (as of late April 2020)
- Platforms [stored as a comma-separated string] (Windows, Mac OS, Linux, PS4, Xbox One, Nintendo Switch, Android, iOS)
- Genres [stored as a comma-separated string] (Puzzle, Point and Click, Action, Adventure, Platformer)
- Multiplayer/co-op boolean (N/Y or 0/1)
- Cover image (stored as a unique filename using uuid)
- YouTube trailer video code (optional)

## Website Features:
- General
  - Login/Logout functionality only for the insert/edit pages to do any database CRUD
  - Site-wide search bar that leads to a results page
- Main page
  - Game filtering:
    - View all
    - Multiplayer only
    - Platform
    - Genre
    - Release Year
  - Sorting:
    - View all
    - Title A-Z
    - Title Z-A
    - Price low to high
    - Price high to low
    - Release date new to old
    - Release date old to new
  - Random game widget

---

<details>
<summary>Login credentials</summary>
<br>

username: *catalogadmin*

password: *securepw*
</details>

