Code Katas
=================

[![Build Status](https://travis-ci.org/leinbg/CodeKatas.svg?branch=master)](https://travis-ci.org/leinbg/CodeKatas)
[![Code Climate](https://codeclimate.com/github/leinbg/CodeKatas/badges/gpa.svg)](https://codeclimate.com/github/leinbg/CodeKatas)

TDD using phpspec to practice common Katas

List
------
- Roman Numbers
    - algorithm convert numbers to RomanNumber
- Potter
    - series of 5 books, there are discounts when buying more than one different books
        - 1 book, 8 Euro
        - 2 book, 95%
        - 3 book, 90%
        - 4 book, 80%
        - 5 book, 75%

	try to find out the best purchase strategy in different situations
- Numbers in Words
    - convert positive numbers(integer, float) into string
- DictionaryReplacer
    - replace string using dictionary
- File Logger
    1. FileLogger::log(string message) and the message should be appended to the end of the log file. 
    2. If the file doesn't exist, create it. If it does exist, use it and append to it.
    3. change log file to log_YYYYMMDD.txt, where YYYYMMDD corresponds to the current date.
    4. log to "log_weekend.txt" on Saturday or Sunday.
- Prime factor
    - 10 = 2 * 5, 2 and 5 are the prime factors of 10
    - 60 = 2 * 2 * 3 * 5 and 2, 3, 5 are the prime factors of 60
- Bowling
    - gutter ball => 0
    - default 
        - 1 frame = 2 rolls
        - score of frame = roll(1) + roll(2)
    - spare
        - 1 frame = 2 rolls
        - score of frame = 10 + next roll
    - strike
        - 1 frame = 1 roll
        - score of frame = 10 + next 2 roll
todo
-----
- RegexGeneratorApi
- Bowling