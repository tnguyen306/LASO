import json
from contextlib import contextmanager

class BaseMethod(Object):
    # Construct; Handle default and specific invocations
    def __init__(self, *args, **kwargs):
        self.args = args
        self.kwarfs = kwargs
        self.done= []

    # handle errors and
    @contextmanager
    def work(self, start, end):
        # maintain database solution
        # update on open
        try:
            yield
        except Exception as err:
            pass
            # insert e information to error
        # update from close

    # get api information from table
    def api(self):
        pass

    # get item generator
    def items(self):
        item = []
        yield item

    # put in table
    def put(self):
        pass

    # handle errors
    de

    # return indication of what succeeded
