## Hi there 👋

<!--
**webtechnologyworld/webtechnologyworld** is a ✨ _special_ ✨ repository because its `README.md` (this file) appears on your GitHub profile.

Here are some ideas to get you started:

- 🔭 I’m currently working on ...
- 🌱 I’m currently learning ...
- 👯 I’m looking to collaborate on ...
- 🤔 I’m looking for help with ...
- 💬 Ask me about ...
- 📫 How to reach me: ...
- 😄 Pronouns: ...
- ⚡ Fun fact: ...
-->
## Git Workflow for Development

Follow these steps to ensure a smooth development process:

**1. Pull the latest code**
Before starting, ensure your local repository is up to date:

```sh
git pull
```

### **2. Create a branch**
Before starting, create a new branch from latest code (main brach):
check the current branch

```sh
git status 
```
if it is main branch create a new branch
```sh
git checkout -b "BranchName"
```
if not main branch then go to main branch 

```sh
git checkout main
```

### **3. Development and testing**
Do loacl changes and verify functionalities in local server:

### **4. Push code to Github**
Once you are satisfied with local changes do git add and commit then push:

```sh
git add .
```
or
```sh
git add filename
```
```sh
git commit -m "BranchName:MessageContent"
```
```sh
git push --set-upstream origin BranchName
```
### **5. Raise a PR**
Raise a PR agaist Main branch:

