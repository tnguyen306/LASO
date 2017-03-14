import json
from contextlib import contextmanager

class BaseMethod(Object):
    """
    Base tools to fetch and use bills and other objects from an API and process them gracefully with a generator.
    Defines a base api usage method; inhereting classes will likely have a different api() function.
    """


    def __init__(self, *args, **kwargs):
        """Handle general initialization for all classes."""
        self.type = type
        self.args = args
        self.kwarfs = kwargs
        # get next thing in queue
        # select * from queue where in_progress<>'Y' order by priority desc;
        # set those variables
        self.maximum = ""
        self.minimum = ""
        self.state = ""
        self.queue_id = ""
        # update the queue to put that in progress
        self.processed = 0
        # keep track of what to put in min if we don't finish
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
        pass

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
            # log the exception
            raise err
        # update internal log
        # end generator when at end

    def __del__(self):
        """
        Handle queue and log before deletion.
        """
        # log
        if True:
            pass
            # if we finished it
            # delete from queue where id = {id} self.queue_id
        else:
            pass
            # if we did not
            # update queue set min = {min} , in_progress='N'; self.last
