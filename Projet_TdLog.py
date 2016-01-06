
#Liste des TAGS DISPONIBLES sur Amazon
#Ici seulement 5 exemples
tag0 = "Policier"
tag1 = "Sciences fiction"
tag2 = "Aventure"
tag3 = "Romantique"
tag4 = "Horreur"
tag5 = "Historique"




#Liste de LIVRES PROPOSES sur le site
#Chacun possède des tags
#Hypothèse: Tous ne possèdent pas le même nb de tag 
#(d'où les zéros pour compléter)

livre0 = [tag1, 0, 0]
livre1 = [tag1, tag2, tag3]
livre2 = [tag0, tag4, 0]
livre3 = [tag0, tag5, 0]

liste_livres = [livre0, livre1, livre2, livre3]
nb_livres = len(liste_livres)





#Liste de TAGS DEMANDES par le client
#L'ordre des tags détermine l'importance 
# que le client donne à chaque tag.

liste_demande_client = [tag2, tag3, tag1, tag4, 1, 1]
nb_tags = len(liste_demande_client)




#On construit un TABLEAU DE POINTS où nb_tags = nb colonnes et nb_livres = nb lignes
# Ce tableau est rempli de zéros au départ
# puis de points attribués en fonction des tags que possède le livre et de la 
# valeur de ce tag aux yeux du visiteur de notre site

tableau_points = []
for i in range(nb_tags):
    tableau_points.append([0]*nb_livres)

for i in range(6):
	for j in range(4):
		for k in range(3):
			if liste_demande_client[i] == liste_livres[j][k]:
				tableau_points[i][j] = 1*(nb_tags-i)


#On affiche le tableau de points pour vérifier que
# tout se passe comme on le veut
print(tableau_points)





#On attribut un SCORE à chaque livre en sommant les points qu'il a obtenu 
# grâce à chaque tag
score_livre = []
for i in range(nb_livres):
	score_livre.append(0)

for j in range(nb_livres):
	score_livre[j] = sum(tableau_points[i][j] for i in range(6))


#On affiche les scores des livres pour vérifier que ça fonctionne bien

print(score_livre)





#On va CLASSER LES LIVRES en fonction de leurs scores. 



#Pour cela on crée une liste qui contiendra tous
#les indices des livres classés par ordre de préférence
# ie: indice_fav[0] sera l'indice du plus grand score
#     indice_fav[1] sera l'indice du deuxième plus grand score etc

indice_fav = []
for i in range(nb_livres):
	indice_fav.append(0)

#On va créer une liste de référence remplie de -1
# afin de pouvoir sortir de notre boucle en temps voulu
# (cf: la suite)
score_nul = []
for i in range(nb_livres):
	score_nul.append(-1)




#BOUCLE pour remplir la liste indice_fav dans l'ordre
# des scores décroissants:

while score_livre != score_nul:
	for i in range(nb_livres):
		indice_fav[i] = score_livre.index(max(score_livre))
		score_livre[indice_fav[i]] = -1

		

#Création de la LISTE CLASSEE des livres qui vont
#plaire au visiteur du site:

liste_livres_client = []
for i in range(nb_livres):
	liste_livres_client.append(liste_livre[indice_fav[i]])

for i in range(nb_livres):
	print(liste_livres_client[i])










