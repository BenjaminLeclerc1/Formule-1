#include <iostream>
#include <fstream>
#include <string.h>
#include "IRClientTCP.h"
using namespace std;
⁠#define NBMESUREMAX 500
string laDate[NBMESUREMAX],lHeure[NBMESUREMAX],laVitesse[NBMESUREMAX],leRegime[NBMESUREMAX];
int main()
{ ifstream fichier;
char ligne[500];
fichier.open("mesure.f1");
int nbPoints=0;
fichier.getline(ligne,500);
do
{   fichier>>laDate[nbPoints]>>lHeure[nbPoints]>>laVitesse[nbPoints]>>leRegime[nbPoints];
    cout<<laDate[nbPoints]<<""<<lHeure[nbPoints]<<""<<laVitesse[nbPoints]<<""<<leRegime[nbPoints]<endl;
    nbPoints++;
}   while(!fichier.eof());
    nbPoints--;
    fichier.close();
    IRClientTCP monClient;
    //string requete="POST http://127.0.0.1/exxotest/rest.php/combine HTTP/1.1\r\nHost: 127.0.0.1\r\ncontent-type:application/json\r\ncontent-length:68\r\n\r\nf"date_heure":|"2022-01-0612:00:00","Vitesse":"100","Regime":"3000")";
    for(int i=0;i<nbPoints;i++)
    { monClient.SeConnecterAUnServeur("127.0.0.1",80);
    string leJSON="{\"date_heure\":\""+laDate[I]+""+lHeure[i]+"\",\"Vitesse\":\""+laVitesse[I]+"\",\"Regime\":\""+leRegime[i]+"\"}"; 
    char requete[1500];
    sprintf(requete,"POST http://127.0.0.1/exotest/rest.php/combineHTTP/1.1\r\nHost:127.0.0.\r\ncontent-type:application/json\r\ncontent-length:
    %d\r\n\r\n%s",leJSON.length(),leJSON.c_str());
    cout<<requete<<endl<<endl;
    monClient. Envoyer(requete, strlen (requete));
    }
    monClient.SeDeconnecter();
    return 0;
}