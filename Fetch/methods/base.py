import json
from contextlib import contextmanager

class BaseMethod(Object):
    """
    Base tools to fetch and use bills and other objects from an
     API and process them gracefully with a generator.
    Defines a base api usage method; inhereting classes will
     likely have a different api() function.
    """

    def __init__(self, *args, **kwargs):
        """Handle general initialization for all classes."""
        self.type = type
        self.args = args
        self.kwarfs = kwargs
        # select * from queue where started is null order by priority desc limit 1;
        # keep those variables
        self.maximum = ""
        self.minimum = ""
        self.state = ""
        self.queue_id = ""
        # update queue set in_progress="Y" where id={id}; self.queue_id;
        self.count = 0
        self.last = self.minimum

    def __iter__(self):
        """
        Return the iterator/generator object.
        """
        return self

    def __next__(self):
        """
        Get the next item in the generator.
        """
        return self.next()

    # search the api for the next item
    def api(self):
        """
        Search the api for the next item.
        """
        self.last

    def next(self):
        """
        Get the next item in the generator.
        """
        # grab a thing to work on
        # work on it
        try:
            item = []
            yield item
        except Exception as err:
            # insert into error (state, error, source) {state}, {err}, {src};
            # self.state, str(err), self.queue_id
            raise err
        # update internal log
        # end generator when at end

    def __del__(self):
        """
        Handle queue and log before deletion.
        """
        # log
        # insert into fetchlog (recordsadded) {count} ; self.count
        if True:
            pass
            # if we finished it
            # update queue set finished = now() where id = {id} self.queue_id
        else:
            pass
            # if we did not, add a new queue entry
            # insert into queue (priority, state, min, max)
            # {priority} {state} min = {min} max = {max},
            # in_progress='N';
            # self.priority, self.state,  self.last,  self.maximum
