#!/bin/bash

git add .
git config core.autoconf true
git add .
git commit -m $1
git push origin