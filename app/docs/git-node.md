# GIT and GITHub
 
Create repository > change repo location (if required) > upload repo
**upload commit** stage file > commit file >push to server
| Task                 | Command                           | Notes                                            |
|:---------------------|:----------------------------------|:-------------------------------------------------|
| change repo location | git remote set-url origin new-URL | This is used to update a url of an existing repo |
| change repo location | git remote add origin new-URL     | This is used when setting a NEW repo             |
| Check repo location  | git remote -v                     |                                                  |
| Clone repo           | git clone github-URL              | include http or https                            |
| commit file          | git commit -m 'Notes goes here'.  |                                                  |
| look for changes     | git status                        |                                                  |
| stage file           | git add -A                        | ready to be committed                            |
| upload to repo       | git push origin NameOfBranch      |                                                  |
|                      |                                   |                                                  |
| restore files        | git checkout -- .                 | restore deleted files                            |
|                      |                                   |                                                  |

### Eliminate passwords
- change the remote origin to remove https://
git remote set-url origin git@github.com/naykel76/nbw_MVC.git



## GIT Commit and Push
| Task                  | Command                      | Notes                      |
|:----------------------|:-----------------------------|:---------------------------|
| Stage and commit      | git commit -am 'message'     | does both at the same time |
| Push to server        | git push origin master       |                            |
| Push branch to server | git push origin NameOfBranch |                            |

a pull request is a command to merge one branch into another

## GIT Branches
| Task                 | Command                    | Notes |
|:---------------------|:---------------------------|:------|
| Create new branch    | git branch NameOfBranch    |       |
| Delete branch        | git branch -d NameOfBranch |       |
| List branches        | git branch                 |       |
| Select branch        | git checkout NameOfBranch  |       |
| Merge branch         | git merge NameOfBranch     |       |
| Merge branch -GIThub |                            |       |






# Work flow Set-up

| Task            | Command                                              | Notes |
|:----------------|:-----------------------------------------------------|:------|
| Install GIT     | download and install                                 |       |
| Initialise git  | git init                                             |       |
| set user name   | git config --global user.name "Nathan"               |       |
| set email       | git config --global user.email "naykel@iinet.net.au" |       |
| Set-up github   | follow the online instructions to link               |       |
| Install node.js | download and install                                 |       |
| Initialise npm  | init npm                                             |       |
| install gulp    | npm install gulp-cli --global                        |       |
| Install gulp    | npm install gulp --save-dev                          |       |
|                 |                                                      |       |
|                 |                                                      |       |

##Linux Ubuntu
- sudo apt-get install git
- sudo add-apt-repository ppa:git-core/ppa 
- sudo apt update; apt install git

##refresh git cache
git rm -rf --cached .
git add .



#NPM (Node Package Manager)
NPM is a centralised place where developers share their code with the world.
Use NPM to download packages like jQuery, Bootstrap ect.

## Install package

| Task                        | Command                            | Notes                    |
|:----------------------------|:-----------------------------------|:-------------------------|
| install package (with json) | npm install packagename --save     | website dependencies     |
| install package (with json) | npm install packagename --save-dev | development dependencies |
| restore package files       | npm install                        | uses the json file       |
| create json                 | npm init                           | project shopping list    |
| check version               | node -v                            |                          |
|                             |                                    |                          |
|                             |                                    |                          |







#Gulp
	npm install gulp --global
Gulp is a build system for automating tasks

## Plugins
gulp-watch - npm install gulp-watch --save-dev


## using postcss and less together
https://webdesign.tutsplus.com/tutorials/using-postcss-together-with-sass-stylus-or-less--cms-24591




npm update minimatch
npm -v minimatch
npm install -g npm@3
npm -v minimatch
