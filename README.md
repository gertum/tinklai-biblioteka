1. Projekto užduotis

Bibliotekos sistema


Administratorius registruoja bibliotekininkus
Bibliotekininkas redaguoja knygų sąrašus ir egz. skaičių
Neprisiregistravęs vartotojas mato sąrašus (visų ir nepaimtų)
Prisiregistravęs vartotojas išsirenka norimus iš nepaimtų ir laikom kad pasiima knygas po 1 egz.
Bibliotekininkas mato kas ką paėmęs, atžymi gražinimą
--- papildomai:
Įvedam įvykių laikus. Knyga išduodama fiksuotam laikui. Jam artėjant į pabaigą, siunčiama žinutė
Vartotojui, pas kurį yra laiku negrąžintų knygų, naujos neišduodamos

3. Informacinės sistemos funkcijos
2.1. Sistemos vartotojų kategorijos
Iš duotos užduoties sąlygos gaunamos tokios vartotojų kategorijos (rolės):
2.1.1. Administratorius
Administratorius turi teises daryti sistemoje ką nori. Jis gali naudoti visas funkcijas suteikiamas
žemesnio rango vartotojams ir dar jis gali registruoti bibliotekinikus.
2.1.2. Bibliotekininkas
Bibliotekinikas gali naudotis visomis vartotojams neadministratoriams prieinamomis funkcijomis.
Taip pat redaguoti knygų sąrašą, peržiūrėti skolinimųsi sąrašą, žymėti knygos grąžinimą.
2.1.3. Lankytojas (registruotas vartotojas)
Lankytojas gali naudoti svečiui prieinamas funkcijas. Taip pat gali pasiskolinti nepaimtą knygą,
nebent turi laiku negrąžintų knygų, peržiūrėti savo skolinimųsi sąrašą. Lankytojas taip pat galbūt gali
siųsti žinutę, nes vis tiek yra žinučių funkcionalumas, tačiau tokios funkcijos nėra reikalavimuose,
todėl ji arba bus, arba nebus.
2.1.4. Svečias (neregistruotas vartotojas)
Svečias gali užsiregistruoti sistemoje, peržiūrėti knygų sąrašą, peržiūrėti nepaimtų knygų sąrašą

2.2. Panaudojimo atvejų diagrama
![image](https://github.com/user-attachments/assets/86ace265-fd11-4213-97d3-29f88594e8f4)

3. Duomenų bazės loginis modelis

![image](https://github.com/user-attachments/assets/eccd38b5-88ec-46b8-9c80-cd91d2fbb29f)


4. Vartotojų darbo aplinkos
4.1. Registracija
Įvedama:
Naujai kuriamo vartotojo duomenys: vardas ir slaptažodis. Turėtų atrodyti maždaug taip:
![image](https://github.com/user-attachments/assets/b736aa65-c6c1-4efb-85fa-9d86ae64c305)

Sėkmingai prisiregistravus turėtų būti matomas toks langas:
![image](https://github.com/user-attachments/assets/ef6c70c1-36f5-4e1d-b2f4-5d062732393f)
4.2. Prisijungimas
Prisijungdamas vartotojas įveda savo vartotojo vardą ir slaptažodį. Langas kaip tai turėtų atrodyti
matomas praeitame punkte.
![image](https://github.com/user-attachments/assets/1ff35de2-76ce-4c12-a093-a2290bc87890)

Sėkmingai prisijungęs visuose languose vartotojas turėtų matyti savo vardą lango viršuje, taip pat, jis
turėtų matyti funkcijas, kurias pasiekia, jei turi reikalingas roles.

![image](https://github.com/user-attachments/assets/cdf3d651-01e7-4d2f-a5da-f5f6ab123a92)
4.3. Atsijungimas
Atsijungimas vykdomas paspaudus atsijungimo mygtuką. Kai vartotojas atsijungia, jis nebemato
jokio vartotojo vardo lango viršuje ir yra nukreipiamas į namų puslapį.
4.4. Knygų sąrašas (namų puslapis)
Vartotojas mato knygų savybes išvestas lentelėje. Pvz.:

![image](https://github.com/user-attachments/assets/65be1345-9f02-428d-a9d8-f11c7e79d35d)

4.5. Nepaimtų knygų sąrašas (filtruotas knygų sąrašas)
Vartotojas mato tik tas knygas, kurių laisvų egzempliorių skaičius nelygus 0.
![image](https://github.com/user-attachments/assets/e116d01d-44ed-4cf7-9651-9e649a975a0c)

4.6. Knygos skolinimasis
Prisijungęs vartotojas turi matyti skolinimosi mygtuką prie knygos knygų sąraše.
11
Jo paprašoma patvirtinti pasiskolinimą modaliniame lange.
![image](https://github.com/user-attachments/assets/a8a0d066-5eea-421f-834b-9bbdc75f41fa)

Kai sėkmingai pasiskolinama knyga, galima pasiskolinimą pamatyti savo skolinimųsi peržiūros
lange.
Taip pat ekrano viršuje turi būti išvedamas sėkmingo pasiskolinimo pranešimas.
4.7. Savo skolinimųsi peržiūra
Prisijungęs vartotojas mato ekrano viršuje mygtuką Mano skolinimaisi ant kurio paspaudęs yra
nukreipiamas į skolinimųsi peržiūros langą.
![image](https://github.com/user-attachments/assets/5b341c97-0280-4f40-a44a-af561ed4caa5)
4.8. Žinučių peržiūra
Prisijungęs vartotojas mato ekrano viršuje mygtuką Mano žinutės ant kurio paspaudęs yra
nukreipiamas į žinučių peržiūros langą.
![image](https://github.com/user-attachments/assets/b5118905-2cce-44f2-9586-acb7ee53492d)

4.9. Žinutės siuntimas
Jeigu bus realizuotas šis funkcionalumas, žinutės rašymo lange bus užpildomi gavėjo ir teksto laukai,
o išsiųstą žinutę bus galima pamatyti Mano žinutės skiltyje.
Taip pat ekrano viršuje turi būti spausdinamas sėkmingo siuntimo pranešimas.
4.10. Visų pasiskolinimų pežiūra
Jeigu prisijungęs vartotojas turi rolę Bibiliotekininkas arba Administratorius, jis turi matyti mygtuką
Visi skolinimaisi.
Jį paspaudęs, jis turi būti nukreipiamas į puslapį, kuriame pateikiamas visų skolinimųsi sąrašas.

![image](https://github.com/user-attachments/assets/d686d46c-ac63-4573-9ce8-d70b59a91fec)
4.11. Knygos grąžinimo žymėjimas
Jeigu prisijungęs vartotojas turi rolę Bibiliotekininkas arba Administratorius, aplankęs visų
skolinimųsi peržiūros puslapį, jis gali paspausti prie skolinimosi, kuris dar neturi grąžinimo datos
Žymėti grąžinimą.
Taip pat ekrano viršuje turi būti išvedamas sėkmingo grąžinimo pranešimas.
![image](https://github.com/user-attachments/assets/daf964b6-6ee9-422a-ae50-05b98d8375c7)
4.12. Knygos pridėjimas
Turintis bibliotekininko arba administratoriaus roles, vartotojas turi matyti knygų sąraše knygos
pridėjimo mygtuką. 
![image](https://github.com/user-attachments/assets/b2470150-d6a0-4c0e-93a0-0e8a36e434e5)

Jį paspaudęs ir modaliniame lange užpildęs laukelius bei patvirtinęs įvestį, jis turi matyti naują knygą
saraše. Modalinis langas:
![image](https://github.com/user-attachments/assets/3d464e8a-6dc8-45ae-b5fa-3a03342bcfc1)

Taip pat ekrano viršuje turi būti išvedamas sėkmingo pridėjimo pranešimas.
4.13. Knygos redagavimas
Turintis bibliotekininko arba administratoriaus roles, vartotojas turi matyti knygų sąraše, prie knygos,
knygos redagavimo mygtuką. Modaliniame lange turėtų būti matoma knygos laukelių informacija.
Juos paredagavus ir patvirtinus redagavimą, knyga sąraše turėtų būti pasikeitusi.
Ekrano viršuje turi būti išvedamas sėkmingos redakcijos pranešimas.
![image](https://github.com/user-attachments/assets/bf9b6272-f8a3-4f51-a00d-cbd3f0db308e)
![image](https://github.com/user-attachments/assets/17b59586-8026-4a03-8dd0-80b7fb662e24)
4.14. Knygos trynimas
Turintis bibliotekininko arba administratoriaus roles, vartotojas turi matyti knygų sąraše, prie knygos,
knygos šalinimo mygtuką. Patvirtinęs šalinimą modaliniame lange, jis turi sąraše knygos nebematyti.
Ekrano viršuje turi būti išvedamas sėkmingo trynimo pranešimas.
![image](https://github.com/user-attachments/assets/2d6ed568-0918-4271-bd08-580abbcbe5e6)

![image](https://github.com/user-attachments/assets/33fe7a68-1261-4508-82d1-95ff3b54df45)

4.15. Bibliotekininko registravimas
Administratoriaus rolę turintis vartotojas turi ekrano viršuje matyti mygtuką Registruoti
bibliotekininką. Jį paspaudęs ir įvedęs naujo bibliotekininko vartotojo vardą ir slaptažodį jis
užregistruoja naują bibliotekininką. Po to vartotojas turi būti nukreipiamas į namų puslapį.
Ekrano viršuje turi būti išvedamas sėkmingos registracijos pranešimas.

5. Testavimas
Testavimo metu aplankomi visi keliai nurodyti routes/web.php ir naudojant naršyklės teksto įvedimo
laukelį (norint užtikrinti, kad nėra priėjimo neautorizuotiems vartotojams), ir mygtukų spaudinėjimo
pagalba. Patikrinamos visus UCM numatytos funkcijos.
Svečio funkcijos
1. Namų puslapyje (url galas / ) turi būti matomas knygų sąrašas.
2. Paspaudus mygtuką Rodyti filtruotas knygas, turi būti pateikiamas tik laisvų egzempliorių
turinčių knygų sąrašas.
3. Vėl turėtų būti mygtukas Rodyti visas knygas: reikia grįžti į namų puslapį.
4. Užsiregistruoti paspaudus mygtuką Registruotis. Turėtų būti matomas kiekvieno puslapio
viršuje.
5. Prisijungti su naujai sukurtu vartotoju. Ar jis mato tas funkcijas, kurias turi matyti Lankytojas?
Lankytojo funkcijos
1. Pasižiūrim savo skolinimųsi sąrašą. Jis turėtų būti pasiekiamas iš bet kurio lango paspaudus
mygtuką Mano skolinimaisi.
2. Grįžę į namų sąrašą, kuris turi būti pasiekiamas iš visų puslapių Knygų sąrašas mygtuko
paspaudimu, turime matyti galimybę skolintis knygas, turinčias laisvų egzempliorių.
3. Pasiskolinam knygą.
4. Mūsų skolinimųsi sąraše turi būti nauji skolinimaisi toms knygoms, kurias nusprendėme
pasiskolinti.
5. Iš bet kurio puslapio turi būti pasiekiamas gautų žinučių sąrašas mygtuko Mano žinutės
paspaudimu. Čia turėtų būti lankytojui visitor_user sukurta viena žinutė.
Bibliotekininko funkcijos
1. Peržiūrėti visų skolinimųsi sąrašą, kuris iš bet kurio puslapio pasiekiamas mygtuko Visi
skolinimaisi paspaudimu.
2. Prie knygų, kurios nėra grąžintos (grąžinimo laiko atributas = null), turi būti mygtukai Žymėti
grąžinimą. Patikrinti ar veikia.
3. Grįžus į namų puslapį sukurti knygą.
4. Paredaguoti knygą (namų puslapyje).
5. Ištrinti knygą. Namų puslapyje.
Administratoriaus funkcijos
1. Užregistruoti naują bibliotekininką paspaudus mygtuką Registruoti bibliotekininką.
2. Prisijungus su naujo bibliotekininko duomenimis patikrinti ar matomos reikalingos funkcijos.
3. Taip pat administratoriui sukūriau vėluojančių skolinimųsi. Jis neturi leidimo pasiskolinti
naują knygą, kol negrąžina senų.
Blogis
Jeigu vartotojas labai norėtų, jis galėtų pasiekti knygos skolinimąsi net jei ir nėra laisų egzempliorių
(kas neveiktų), bet, kas blogiausia, kad galėtų pasiimti knygą, jei vėluoja, nes tikrinimas vyksta tik
blade faile.
Neįvilkau savo kelių į tikrinimą ar vartotojas prisijungęs, bet tai neturėtų turėti daug reikšmės, nes
ten visada gaunami rezultatai paėmus vartotojo id, todėl turėtų būti grąžinamos klaidos.
Gali būti, kad parašiau ir palikau angliško teksto.
Prisijungimo prie sistemos detalės
Gauti prisijungimo ir registracijos formas naudojami get keliai /login ir /register. Tuo pačiu vardu,
bet post metodai yra naudojami kontrolerio kvietimui. Dar yra post /logout.
Iš pradžių pasileidus sistemą ir seederius turėtume turėti vartotojus:
Vartotojo vardas Slaptažodis Rolė
admin_user admin_password Administratorius
librarian_user librarian_password Bibliotekininkas
visitor_user visitor_password Lankytojas

6. Sistemos instaliavimas ir paleidimas
Reikia savo kompiuteryje turėti apache, mysql, ir ^8.1
php versiją, norint pasileisti mano projektą. Pas mane yra Apache/2.4.52 (Ubuntu) ir Ver 8.0.35-
0ubuntu0.22.04.1 for Linux on x86_64.
Sistemą reikia norimame aplankale pasipullinti iš git repozitorijos:
https://github.com/gertum/tinklai-biblioteka
Tam, kad projektas veiktų, gali reikėti sukonfigūruoti iki jo kelią. Aš konfigūravau taip:
/etc/hosts faile pridėjau eilutę:
127.0.0.1 tinklai-bibliotekos.dv
Ir tada specialiai šitam projektui sukurtame konfigūraciniame /etc/apache2/sites-available/
bibliotekusistema.conf faile nurodžiau kelią iki projekto:
VirtualHost *:80>
 ServerAdmin admin@example.com
 ServerName tinklai-bibliotekos.dv
 DocumentRoot /home/ger/projects/tinklai/bibliotekos_sistema/public
 <Directory /home/ger/projects/tinklai/bibliotekos_sistema>
 Options Indexes MultiViews FollowSymLinks
 AllowOverride All
 Require all granted
 </Directory>
 ErrorLog ${APACHE_LOG_DIR}/tinklai_bibliotekos_error.log
 CustomLog ${APACHE_LOG_DIR}/tinklai_bibliotekos_access.log combined
</VirtualHost>
Svarbūs aspektai:
DocumentRoot yra projekto /public aplanke. Ir reikia konfigūraciją įgalinti ir perkrauti apache.
sudo a2ensite bibliotekusistema.conf
systemctl reload
Norint, kad būtų suinstaliuotos papildomos bibliotekos projekto veikimui reikia paleisti
composer update
Paties projekto konfigūracija
Reikia .env faile, esančiame projekto šaknyje, įrašyti duomenis prisijungimui prie db. Aš susikūriau
savo mysql sistemoje vartotoją specialiai darbui su šia sistema. Ta dalis .env faile, kurią reikia
susikonfigūruoti:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tinklai_bibliotekos
DB_USERNAME=tinklai_bibliotekos
DB_PASSWORD=tinklai_bibliotekos

Tam, kad .env failą būtų galima konfigūruoti, greičiausiai reikia nusikopijuoti .env.example failą ir
pavadinti .env.
Testiniai duomenys
Aš sukūriau Laravel migracijas ir seeder’ius tam, kad db būtų užpildoma pakankamai plačia imtimi
testinių duomenų. Gali reikėti susikurti pačią db savarankiškai. Pvz. Su phpmyadmin įrankiu kuriama,
tinklai_bibliotekos db. Jeigu yra poreikis, galima kurti su kitokiu pavadinimu ir pakeisti .env faile
DB_DATABASE priskirtą reikšmę.
Pasileidus sistemą, norint užpildyti ją duomenimis reikia paleisti komandas:
php artisan migrate
php artisan db:seed

