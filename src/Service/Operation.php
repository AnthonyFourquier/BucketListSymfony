<?php

namespace App\Service;

class Operation {
    
    public function clean($string) {

        $tabInsulte = ["abruti",
        "aller chier dans sa caisse",
        "aller niquer sa mère",
        "aller se faire enculer",
        "aller se faire endauffer",
        "aller se faire foutre",
        "aller se faire mettre",
        "andouille",
        "anglo-fou",
        "appareilleuse",
        "arabe",
        "assimilé",
        "assimilée",
        "astèque",
        "avorton",
        "bachi-bouzouk",
        "baleine",
        "bande d’abrutis",
        "baraki",
        "bâtard",
        "baudet",
        "beauf",
        "bellicole",
        "bête",
        "bête à pleurer",
        "bête comme ses pieds",
        "bête comme un chou",
        "bête comme un cochon",
        "bête comme un cygne",
        "bête comme une oie",
        "biatch",
        "bibi",
        "bic",
        "bicot",
        "bicotte",
        "bique",
        "bite",
        "bitembois",
        "Bitembois",
        "bolos",
        "bordille",
        "boucaque",
        "boudin",
        "bouègre",
        "bouffi",
        "bouffon",
        "bouffonne",
        "bougnoul",
        "bougnoule",
        "Bougnoulie",
        "bougnoulisation",
        "bougnouliser",
        "bougre",
        "boukak",
        "boulet",
        "bounioul",
        "bounioule",
        "bourdille",
        "bourrer",
        "bourricot",
        "bovo",
        "branleur",
        "bridé",
        "bridée",
        "brigand",
        "brise-burnes",
        "bulot",
        "cacou",
        "cafre",
        "cageot",
        "caldoche",
        "carcavel",
        "casse-bonbon",
        "casse-couille",
        "casse-couilles",
        "cave",
        "chagasse",
        "charlot de vogue",
        "charogne",
        "chauffard",
        "chbeb",
        "cheveux bleus",
        "chiabrena",
        "chien de chrétien",
        "chiennasse",
        "chienne",
        "chier",
        "chieur",
        "chieuse",
        "chinetoc",
        "chinetoque",
        "Chinetoque",
        "chintok",
        "chleuh",
        "chnoque",
        "choucroutard",
        "citrouille",
        "coche",
        "colon",
        "complotiste",
        "con",
        "con comme la lune",
        "con comme ses pieds",
        "con comme un balai",
        "con comme un manche",
        "con comme une chaise",
        "con comme une valise",
        "con comme une valise à poignée intérieure",
        "con comme une valise sans poignée",
        "conasse",
        "conchier",
        "Conchita",
        "connard",
        "connarde",
        "connasse",
        "connaud",
        "conspirationniste",
        "contracibête",
        "couille molle",
        "counifle",
        "courtaud",
        "courtaude",
        "CPF",
        "crétin",
        "crevure",
        "cricri",
        "crotté",
        "crouïa",
        "crouillat",
        "crouille",
        "croûton",
        "dago",
        "débile",
        "débougnouliser",
        "doryphore",
        "doxosophe",
        "doxosophie",
        "drouille",
        "du schnoc",
        "ducon",
        "duconnot",
        "dugenoux",
        "dugland",
        "duschnock",
        "emmanché",
        "emmerder",
        "emmerdeur",
        "emmerdeuse",
        "empafé",
        "empaffé",
        "empapaouté",
        "enculé",
        "enculé de ta race",
        "enculer",
        "enfant de fusil",
        "enfant de garce",
        "enfant de putain",
        "enfant de pute",
        "enfant de salaud",
        "enflure",
        "enfoiré",
        "envaselineur",
        "envoyer faire foutre",
        "épais",
        "espèce de",
        "espingoin",
        "espingouin",
        "étron",
        "face de chien",
        "face de craie",
        "face de pet",
        "face de rat",
        "fachiste",
        "FDP",
        "fell",
        "fermer sa gueule",
        "fils de bâtard",
        "fils de chien",
        "fils de chienne",
        "fils de garce",
        "fils de pute",
        "fils de ta race",
        "fiotte",
        "floco",
        "folle",
        "fouteur",
        "foutriquet",
        "fragile",
        "fripouille",
        "frisé",
        "fritz",
        "Fritz",
        "fumelard",
        "fumier",
        "garage à bite",
        "garage à bites",
        "garce",
        "gaupe",
        "GDM",
        "gestapette",
        "Gestapette",
        "gland",
        "glandeur",
        "glandeuse",
        "glandouillou",
        "glandu",
        "glandue",
        "gnoul",
        "gnoule",
        "Godon",
        "gogol",
        "gogole",
        "gogolito",
        "goï",
        "gook",
        "gouilland",
        "gouine",
        "goulou-goulou",
        "gourdasse",
        "gourde",
        "gourgandine",
        "grognasse",
        "gueniche",
        "guide de merde",
        "guindoule",
        "gwer",
        "habitant",
        "halouf",
        "hippopotame",
        "imbécile",
        "incapable",
        "islamo-gauchisme",
        "islamo-gauchiste",
        "islamogauchiste",
        "jean-foutre",
        "jean-fesse",
        "jeannette",
        "journalope",
        "judéo-bellicisme",
        "judéo-belliciste",
        "judéo-bolchévisme",
        "judéobellicisme",
        "judéobelliciste",
        "juivaillon",
        "kaffir",
        "karlouche",
        "kawish",
        "khel",
        "Khmer rose",
        "Khmer rouge",
        "Khmer vert",
        "kikoo",
        "kikou",
        "koreaboo",
        "Kraut",
        "krouia",
        "kung flu",
        "la fermer",
        "lâche",
        "lâcheux",
        "lavette",
        "loche",
        "lopette",
        "lorpidon",
        "lourpidon",
        "macaroni",
        "magot",
        "makoumé",
        "mal blanchi",
        "mange-merde",
        "manger du nègre",
        "manger ses morts",
        "mangeux de marde",
        "marchandot",
        "margouilliste",
        "marlouf",
        "marsouin",
        "marsouine",
        "mauviette",
        "maya",
        "melon",
        "mercon",
        "merdaille",
        "merdaillon",
        "merde",
        "merdeuse",
        "merdeux",
        "merdouillard",
        "michto",
        "minable",
        "minus",
        "misérable",
        "moinaille",
        "moins-que-rien",
        "mollusque",
        "monacaille",
        "mongol",
        "mongol à batteries",
        "moricaud",
        "mort aux vaches",
        "morue",
        "moule à gaufres",
        "moule à merde",
        "mouloud",
        "muzz",
        "naze",
        "nazi",
        "ndepso",
        "nèg",
        "négraille",
        "nègre",
        "nègre d’Océanie",
        "négresse",
        "négro",
        "newfie",
        "nez de bœuf",
        "niac",
        "niafou",
        "niaiseux",
        "niakoué",
        "Niakoué",
        "niaqué",
        "nique sa mère",
        "nique ta mère",
        "niquer",
        "niquer sa mère",
        "niquer sa reum",
        "niquez votre mère",
        "nodocéphale",
        "nœud",
        "noob",
        "nord-phocéen",
        "NTM",
        "ntr",
        "nul",
        "nulle",
        "orchidoclaste",
        "ordure",
        "ortho",
        "pakos",
        "panoufle",
        "patarin",
        "PD",
        "peau",
        "peau d’hareng",
        "peau de couille",
        "peau de fesse",
        "peau de vache",
        "pecque",
        "pédale",
        "pédé",
        "pédoque",
        "pelle à merde",
        "péquenaud",
        "personnage de comédie",
        "petite bite",
        "petite merde",
        "pignouf",
        "pignoufe",
        "pisser à la raie",
        "pissou",
        "pithécanthrope",
        "planche à repasser",
        "pleutre",
        "plouc",
        "pochard",
        "poissonnière",
        "pompe à vélo",
        "porc",
        "porcas",
        "porcasse",
        "pot de merde",
        "pouf",
        "pouffiasse",
        "poufiasse",
        "poundé",
        "pourriture",
        "punaise",
        "putain",
        "putain de ta race",
        "pute",
        "pute borgne",
        "putois",
        "raclure",
        "raclure de bidet",
        "radoteur",
        "rat",
        "raté",
        "ratée",
        "raton",
        "résidu de capote",
        "résidu de fausse couche",
        "retourne aux asperges",
        "ripopée",
        "robespierrot",
        "roi des cons",
        "roi nègre",
        "rond de chiotte",
        "rosbif",
        "roulure",
        "sac à foutre",
        "sac à merde",
        "sac à papier",
        "sagouin",
        "sagouine",
        "salaud",
        "salaude",
        "sale",
        "salop",
        "salope",
        "sans-couilles",
        "satrouille",
        "sauvage",
        "sauvagesse",
        "schbeb",
        "schlague",
        "schleu",
        "Schleu",
        "Schleue",
        "schnock",
        "schnoque",
        "sent-la-pisse",
        "sidi",
        "social-traître",
        "sorcière",
        "sottiseux",
        "sous-merde",
        "stéarique",
        "ta bouche",
        "ta gueule",
        "ta mère",
        "ta mère la pute",
        "ta race",
        "ta yeule",
        "tache",
        "tafiole",
        "tantouserie",
        "tantouze",
        "tapette",
        "tapettitude",
        "tarlouze",
        "tata",
        "tchoutche",
        "tebé",
        "tête carrée",
        "tête de boche",
        "tête de cochon",
        "tête de con",
        "tête de gland",
        "tête de linotte",
        "tête de mort",
        "tête de mule",
        "tête de nœud",
        "tête de veau",
        "téteux",
        "teub",
        "teubé",
        "Thénardier",
        "thon",
        "tocard",
        "tonnerre",
        "traînée",
        "travail d’Arabe",
        "travailler comme un nègre",
        "triple buse",
        "trou de cul",
        "trou du cul",
        "trouduc",
        "truiasse",
        "truie",
        "va te faire foutre",
        "va te faire une soupe d’esques",
        "vaurien",
        "vaurienne",
        "vendu",
        "vert-de-gris",
        "vide-couilles",
        "viédase",
        "vieille conne",
        "vier",
        "vieux",
        "vieux blanc",
        "vieux con",
        "vipère lubrique",
        "visage à deux faces",
        "weeaboo",
        "xéropineur",
        "y’a bon",
        "youd",
        "youp",
        "youpin",
        "youpine",
        "youpinisation",
        "youpiniser",
        "youtre",
        "zemel",
        "zguègue",
        "zoulette"];

    //     $result = $string;
    //    $index = array_search($string, $tabInsulte);
    //    if ($index != null) {
    //         $value = $tabInsulte[$index];
    //         if (strcmp($value, $string)) {
    //             $result = str_replace($tabInsulte, "*", $string);
    //         }
    //    }
    //     return $result;
    }

}