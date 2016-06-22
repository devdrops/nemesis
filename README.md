# Nemesis

### Requirements

* PHP >= 5.6
* Composer

### Installing

1. Clone this repository, then `cd nemesis`;
2. Install all dependencies by executing:

    ```terminal
    composer install
    ```

3. Then, `cd web/`;
4. Once inside the `web` folder, run the command:

    ```terminal
    php -S localhost:8081
    ```

5. Then, in any browser, open `http://localhost:8081/index.php/repos/<any_github_username>` to check the first navigation.

### Resources:

* `/repos/<github_username>` will list all the repositories starred by the given `<github_username>`. It also supports ordenation, as explained below:
    
    * Alphabetical, by adding `orderBy=nameAsc` or `orderBy=nameDesc` on the query string;
    * Stars, by adding `orderBy=starAsc` or `orderBy=starDesc` on the query string;
    * Issues, by adding `orderBy=issueAsc` or `orderBy=issueDesc` on the query string.

    **OBS:** supports only one ordenation per request.

* `/repos/<github_username>/<language>` will provide the same list, but now filtering by the given `<language>`;
