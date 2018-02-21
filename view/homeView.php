<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Blog de Jean Forteroche</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="contenu/css/style.css" rel="stylesheet">
</head>
<body>
  <div id="container">
    <header>
      <h1>BLOG DE JEAN FORTEROCHE</h1>
      <nav>
        <ul>
          <li><i class="fas fa-home"></i><a href="#">Accueil</a></li>
          <li><i class="fas fa-book"></i><a href="#">Chapitres</a><i class="fas fa-sort-down"></i></li>
          <li><i class="fas fa-pencil-alt"></i><a href="#">S'identifier</a></li>
        </ul>
      </nav>
    </header>
    <div id="descriptif-container">
      <p>Bienvenue sur mon blog</br>Pour lire mon nouveau roman</p>
      <button>Cliquez ici</button>
    </div>
  </div>
  <section>
    <div id="container-tableau">
        <table id="tableau-chapitres">
            <thead>
                <tr>
                    <th>Derniers chapitres ajoutés</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
              <?php
              while ($donnees = $req->fetch())
              {
              ?>
                <tr>
                    <td><?php echo htmlspecialchars($donnees['title'])?></td>
                    <td><?php echo htmlspecialchars($donnees['date_post'])?></td>
                </tr>
              <?php
              }
              $req->closeCursor();
              ?>
            </tbody>
        </table>
        <table id="tableau-commentaires">
            <thead>
                <tr>
                    <th>Dernier commentaire</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Super</td>
                    <td>12/07/2018</td>
                </tr>
                <tr>
                    <td>Fantastique</td>
                    <td>12/07/2018</td>
                </tr>
            </tbody>
        </table>
    </div>
      <section id="extrait-roman">
        <h1>Extrait de mon nouveau roman</h1>
              <p>Inter has ruinarum varietates a Nisibi quam tuebatur accitus Vrsicinus, cui nos obsecuturos iunxerat imperiale praeceptum, dispicere litis exitialis certamina cogebatur abnuens et reclamans, adulatorum oblatrantibus turmis, bellicosus sane milesque semper et militum ductor sed forensibus iurgiis longe discretus, qui metu sui discriminis anxius cum accusatores quaesitoresque subditivos sibi consociatos ex isdem foveis cerneret emergentes, quae clam palamve agitabantur, occultis Constantium litteris edocebat inplorans subsidia, quorum metu tumor notissimus Caesaris exhalaret. Sed (saepe enim redeo ad Scipionem, cuius omnis sermo erat de amicitia) querebatur, quod omnibus in rebus homines diligentiores essent; capras et oves quot quisque haberet, dicere posse, amicos quot haberet, non posse dicere et in illis quidem parandis adhibere curam, in amicis eligendis neglegentis esse nec habere quasi signa quaedam et notas, quibus eos qui ad amicitias essent idonei, iudicarent. Sunt igitur firmi et stabiles et constantes eligendi; cuius generis est magna penuria. Et iudicare difficile est sane nisi expertum; experiendum autem est in ipsa amicitia. Ita praecurrit amicitia iudicium tollitque experiendi potestatem. Quam quidem partem accusationis admiratus sum et moleste tuli potissimum esse Atratino datam. Neque enim decebat neque aetas illa postulabat neque, id quod animadvertere poteratis, pudor patiebatur optimi adulescentis in tali illum oratione versari. Vellem aliquis ex vobis robustioribus hunc male dicendi locum suscepisset; aliquanto liberius et fortius et magis more nostro refutaremus istam male dicendi licentiam. Tecum, Atratine, agam lenius, quod et pudor tuus moderatur orationi meae et meum erga te parentemque tuum beneficium tueri debeo. Ex his quidam aeternitati se commendari posse per statuas aestimantes eas ardenter adfectant quasi plus praemii de figmentis aereis sensu carentibus adepturi, quam ex conscientia honeste recteque factorum, easque auro curant inbracteari, quod Acilio Glabrioni delatum est primo, cum consiliis armisque regem superasset Antiochum. quam autem sit pulchrum exigua haec spernentem et minima ad ascensus verae gloriae tendere longos et arduos, ut memorat vates Ascraeus, Censorius Cato monstravit. qui interrogatus quam ob rem inter multos... statuam non haberet malo inquit ambigere bonos quam ob rem id non meruerim, quam quod est gravius cur inpetraverim mussitare. Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit</p>
      </section>
      </section>
  <footer>
    <p>Mention légale | Site réalisé par Clément RAYMOND pour la formation Openclassroom</p>
  </footer>
</body>
</html>
