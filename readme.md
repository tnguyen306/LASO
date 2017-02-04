LASO Version 2 Design:

## CONTENTS
frontend contains a prototype of the new core page, and visual design related items

## NOTES

Single Page Application Layer (Angular/HTML5)
-"constant login"
    page gets salt from request serving layer, salts salt, then time down to minute, then hashed
    this is done for all "private" requests
    no auth information to be stored in cookie, cache, or whatever
-get/put requests from request layer
    request or send information, stateless, with auth information, request details
    a request can be multiple pieces of information
    check cache first
-store in cache
    if allowed (by type) put data in cache

Request/API Layer (PHP)
-authentication and authorization
    takes in the username, hash "mess" and the time
    only tries if time is within a tolerance (say 5 minutes?)
-compound requests
    parse out the requests, query each at db layer
    return results together in a js friendly format
-incoming data
    read in data
    validation/cleaning done here
-tell if can be cached
    each response should indicate if it can be cached, and TTL

DB Layer (MySql)
-get data from outside world
    make separate python data-get tool from our sources
-field queries
