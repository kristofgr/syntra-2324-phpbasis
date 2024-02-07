Opdracht 25/10

![](Aspose.Words.aac43ae4-8d56-4b15-9ac4-b6c1fa81556c.001.png)

Verwachtingen:

- Maak een overzicht van soorten zoals in bovenstaande screenshot. Begin met het tonen van álle records (dus zonder pager)
- Sorteer in alfabetische volgorde op basis van de naam van de soort.
- Toon boven de tabel nog een extra tekst: “Aantal soorten: x” waarbij x het aantal records is dat gevonden werd.
- Zorg ervoor dat de tabel gefilterd kan worden op basis van categorie. Indien ik klik op “Vogels” worden enkel soorten binnen de categorie Vogels getoond. Het “aantal soorten” boven de tabel zal dan ook aangepast (minder) worden. Dit moet mogelijk zijn voor alle verschillende categorieën.
- Eens dit werkt, wil ik maximum slechts 20 records per pagina zien. Indien er meer dan 20 records zijn, wordt onderaan de knop “Next” getoond.
- Opgelet, indien er een categorie-filter actief was, dan moet die meegenomen worden naar de volgende pagina. Filter ik dus op alle vogels en ga ik vervolgens naar de tweede pagina, dan wil ik nog steeds enkel vogels te zien krijgen (de volgende 20).
- Toon de knop “next” niet indien er geen volgende pagina meer is 
- Toon een knop “prev” zolang je op een pagina zit waar een voorgaande van bestaat.
- Extra: toon elke beschikbare pagina als een nummer let link tussen “prev” en “next”. Een voorbeeld van wat ik bedoel zie je in volgende screenshot (ik verwacht niet dat je tijd steekt in opmaak, MVP.css is goed genoeg): 

![](Aspose.Words.aac43ae4-8d56-4b15-9ac4-b6c1fa81556c.002.png)

Wat ik belangrijk vind:

- Wees performant: je haalt enkel uit de databank wat je nodig hebt, speel dus met je sql-queries.
- Werk *fail-proof:* anticipeer zoveel mogelijk bugs als gevolg van “foutief” gebruik van je web app.
- Je werk voor een klant -> custom css is NIET nodig, zorg er gewoon voor dat je MVPcss correct gebruikt.
- Schrijf leesbare code aub
- Schrijf je vragen ergens op: Is iets niet duidelijk? Vraag je je iets af? Let us know en we bespreken het klassikaal!
