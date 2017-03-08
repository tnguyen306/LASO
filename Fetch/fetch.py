#/usr/bin/python

import json

# run a check to update queue, calculating priority from 0-100
# (this allows manual priority over 100)

# get chunk from queue, check for soft lock, add a soft lock

# find method from state table in main app

# initalize appropriate method (after check and sanitize)

# for as long as we can before killing:
    # make method get items in batch
    # method.get
    # make method update the table
# get last method position, and update queue/queue locks 
