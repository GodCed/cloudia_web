

<h1>ClouDIA</h1>

<h2>Users</h2>

<h2>Developpers</h2>

<h3>ClouDIAs' members</h3>
<ul> (In alphabetical order)
    <li>Cédric</li>
    <li>Danick</li>
    <li>Donavan</li>
    <li>Julie (CEO)</li>
    <li>...</li>
</ul>

<h3>Commands git (quick help or debug)</h3>
<pre>
Technique if you do it wrong => see below (allow to recovery to old commit version)
git reset –soft HEAD~1 
git add –A
git commit –m 
git push
git pull
git push

If you delete the branch... rewrite on the branch... we still 
git fsck --full --no-reflogs --unreachable --lost-found
ls -1 .git/lost-found/commit/ | xargs -n 1 git log -n 1 --pretty=oneline
git checkout -b branch-name SHA

*git init*
Commande de base : **git init**

*git clone*
Commande de base : **git clone**

*git add*
Commande de base : **git add**
git add . : ajout de nouveaux fichiers sans suppression
git add -u : ajout de fichiers modifiés et supprimés (sans nouveau ajout) 
git add -A : ajout des fichiers (raccourci de git add .; git add –u)

*git branch*
Commande de base : **git branch**
git branch <branch> : ajout d’une branche
git branch –d <branch> : ne plus regarder cette branche 
git branch –D <branch> : force la suppression de la branche
git branch –m <branch> : renomme la branche sur laquelle je suis
git branch –a : liste les branches locales et les branches suivi à distance

*git checkout*
Commande de base : **git checkout**
git checkout <existing-branch> : regarde si la branche a été créer avec git branch et change
git checkout –b <new-branch> <branch> : créer une nouvelle branche si n’existe pas déjà
git 

*git merge*
Commande de base : **git merge**
git merge <branch> : merge la branche spécifier à celle actuelle
git merge –no-ff <branch> : générer un merge commit (on peut avoir une trace)
git 

*git pull*
Commande de base : **git pull**
git pull --rebase origin master : option --rebase déplace tous les commit à la branche spéficier
git status
git

*git rebase*
Commande de base : **git rebase**
git rebase --continue
git rebase : pour revenir à la dernière exécution de la commande git pull –rebase

*git push*
Commande de base : **git push**
git push origin <branch> : ...
git push origin <branch> -f : ... 
git push -u origin <branch> : ...
</pre>

<h3>DB_setting.php</h3>
<p>This is a file ...</p>

<h2>Server configuration</h2>
Danick is going to do that soon!
