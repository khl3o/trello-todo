# trello-todo-cli

Usage:

* Add git branch name in Trello card description
* Type "todo" on terminal to get the card checklists

![alt text](https://github.com/khl3o/trello-todo-cli/blob/master/readme_src/trello.png)

![alt text](https://github.com/khl3o/trello-todo-cli/blob/master/readme_src/terminal.png)

# Requirements

* PHP installed on the system

# Install (Linux/macOS)

* Clone the repo where you want 
* Add execution rights to exec.sh: `chmod +x exec.sh`
* Create an alias:
  * open ~/.bashrc (or ~/.zshrc)
  * add the following alias: `alias todo="YOUR_PATH/trello-cli/exec.sh"`
  * reload: `source ~/.bashrc`
* Create config.php from config.php.sample
* Set the trello key, token and board id (https://trello.com/app-key)
