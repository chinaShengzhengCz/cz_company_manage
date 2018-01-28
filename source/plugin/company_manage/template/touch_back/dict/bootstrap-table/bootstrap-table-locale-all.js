/**
 * Bootstrap Table Afrikaans translation
 * Author: Phillip Kruger <phillip.kruger@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['af-ZA'] = {
        formatLoadingMessage: function () {
            return 'Besig om te laai, wag asseblief ...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' rekords per bladsy';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Resultate ' + pageFrom + ' tot ' + pageTo + ' van ' + totalRows + ' rye';
        },
        formatSearch: function () {
            return 'Soek';
        },
        formatNoMatches: function () {
            return 'Geen rekords gevind nie';
        },
        formatPaginationSwitch: function () {
            return 'Wys/verberg bladsy nummering';
        },
        formatRefresh: function () {
            return 'Herlaai';
        },
        formatToggle: function () {
            return 'Wissel';
        },
        formatColumns: function () {
            return 'Kolomme';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['af-ZA']);

})(jQuery);

/**
 * Bootstrap Table English translation
 * Author: Zhixin Wen<wenzhixin2010@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['ar-SA'] = {
        formatLoadingMessage: function () {
            return '???? ???????, ???? ????????...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' ??? ??? ????';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return '?????? ' + pageFrom + ' ??? ' + pageTo + ' ?? ' + totalRows + ' ???';
        },
        formatSearch: function () {
            return '???';
        },
        formatNoMatches: function () {
            return '?? ???? ????? ?????? ?????';
        },
        formatPaginationSwitch: function () {
            return '?????\????? ????? ???????';
        },
        formatRefresh: function () {
            return '?????';
        },
        formatToggle: function () {
            return '?????';
        },
        formatColumns: function () {
            return '?????';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['ar-SA']);

})(jQuery);

/**
 * Bootstrap Table Catalan translation
 * Authors: Marc Pina<iwalkalone69@gmail.com>
 *          Claudi Martinez<claudix.kernel@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['ca-ES'] = {
        formatLoadingMessage: function () {
            return 'Espereu, si us plau...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' resultats per pàgina';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Mostrant de ' + pageFrom + ' fins ' + pageTo + ' - total ' + totalRows + ' resultats';
        },
        formatSearch: function () {
            return 'Cerca';
        },
        formatNoMatches: function () {
            return 'No s\'han trobat resultats';
        },
        formatPaginationSwitch: function () {
            return 'Amaga/Mostra paginació';
        },
        formatRefresh: function () {
            return 'Refresca';
        },
        formatToggle: function () {
            return 'Alterna formatació';
        },
        formatColumns: function () {
            return 'Columnes';
        },
        formatAllRows: function () {
            return 'Tots';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['ca-ES']);

})(jQuery);

/**
 * Bootstrap Table Czech translation
 * Author: Lukas Kral (monarcha@seznam.cz)
 * Author: Jakub Svestka <svestka1999@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['cs-CZ'] = {
        formatLoadingMessage: function () {
            return '?ekejte, prosím...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' polo?ek na stránku';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Zobrazena ' + pageFrom + '. - ' + pageTo + '. polo?ka z celkovych ' + totalRows;
        },
        formatSearch: function () {
            return 'Vyhledávání';
        },
        formatNoMatches: function () {
            return 'Nenalezena ?ádná vyhovující polo?ka';
        },
        formatPaginationSwitch: function () {
            return 'Skryt/Zobrazit stránkování';
        },
        formatRefresh: function () {
            return 'Aktualizovat';
        },
        formatToggle: function () {
            return 'P?epni';
        },
        formatColumns: function () {
            return 'Sloupce';
        },
        formatAllRows: function () {
            return 'V?e';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['cs-CZ']);

})(jQuery);

/**
 * Bootstrap Table danish translation
 * Author: Your Name Jan Borup Coyle, github@coyle.dk
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['da-DK'] = {
        formatLoadingMessage: function () {
            return 'Indl?ser, vent venligst...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' poster pr side';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Viser ' + pageFrom + ' til ' + pageTo + ' af ' + totalRows + ' r?kker';
        },
        formatSearch: function () {
            return 'S?g';
        },
        formatNoMatches: function () {
            return 'Ingen poster fundet';
        },
        formatRefresh: function () {
            return 'Opdater';
        },
        formatToggle: function () {
            return 'Skift';
        },
        formatColumns: function () {
            return 'Kolonner';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['da-DK']);

})(jQuery);
/**
* Bootstrap Table German translation
* Author: Paul Mohr - Sopamo<p.mohr@sopamo.de>
*/
(function ($) {
  'use strict';

  $.fn.bootstrapTable.locales['de-DE'] = {
    formatLoadingMessage: function () {
      return 'Lade, bitte warten...';
    },
    formatRecordsPerPage: function (pageNumber) {
      return pageNumber + ' Eintr?ge pro Seite.';
    },
    formatShowingRows: function (pageFrom, pageTo, totalRows) {
      return 'Zeige Zeile ' + pageFrom + ' bis ' + pageTo + ' von ' + totalRows + ' Zeile' + ((totalRows > 1) ? "n" : "")+".";
    },
    formatDetailPagination: function (totalRows) {
      return 'Zeige ' + totalRows + ' Zeile' + ((totalRows > 1) ? "n" : "")+".";
    },
    formatSearch: function () {
      return 'Suchen ...';
    },
    formatNoMatches: function () {
      return 'Keine passenden Ergebnisse gefunden.';
    },
    formatRefresh: function () {
      return 'Neu laden';
    },
    formatToggle: function () {
      return 'Umschalten';
    },
    formatColumns: function () {
      return 'Spalten';
    },
    formatAllRows: function () {
      return 'Alle';
    }
  };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['de-DE']);

})(jQuery);

/**
 * Bootstrap Table Greek translation
 * Author: giannisdallas
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['el-GR'] = {
        formatLoadingMessage: function () {
            return 'Φορτ?νει, παρακαλ? περιμ?νετε...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' αποτελ?σματα αν? σελ?δα';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Εμφαν?ζονται απ? την ' + pageFrom + ' ω? την ' + pageTo + ' απ? σ?νολο ' + totalRows + ' σειρ?ν';
        },
        formatSearch: function () {
            return 'Αναζητ?στε';
        },
        formatNoMatches: function () {
            return 'Δεν βρ?θηκαν αποτελ?σματα';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['el-GR']);

})(jQuery);

/**
 * Bootstrap Table English translation
 * Author: Zhixin Wen<wenzhixin2010@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['en-US'] = {
        formatLoadingMessage: function () {
            return 'Loading, please wait...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' rows per page';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Showing ' + pageFrom + ' to ' + pageTo + ' of ' + totalRows + ' rows';
        },
        formatSearch: function () {
            return 'Search';
        },
        formatNoMatches: function () {
            return 'No matching records found';
        },
        formatPaginationSwitch: function () {
            return 'Hide/Show pagination';
        },
        formatRefresh: function () {
            return 'Refresh';
        },
        formatToggle: function () {
            return 'Toggle';
        },
        formatColumns: function () {
            return 'Columns';
        },
        formatAllRows: function () {
            return 'All';
        },
        formatExport: function () {
            return 'Export data';
        },
        formatClearFilters: function () {
            return 'Clear filters';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['en-US']);

})(jQuery);

/**
 * Bootstrap Table Spanish (Argentina) translation
 * Author: Felix Vera (felix.vera@gmail.com)
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['es-AR'] = {
        formatLoadingMessage: function () {
            return 'Cargando, espere por favor...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' registros por página';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Mostrando ' + pageFrom + ' a ' + pageTo + ' de ' + totalRows + ' filas';
        },
        formatSearch: function () {
            return 'Buscar';
        },
        formatNoMatches: function () {
            return 'No se encontraron registros';
        },
        formatAllRows: function () {
            return 'Todo';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['es-AR']);

})(jQuery);
/**
 * Traducción de librería Bootstrap Table a Espa?ol (Chile)
 * @author Brian álvarez Azócar
 * email brianalvarezazocar@gmail.com
 */
(function($) {
  'use strict';

  $.fn.bootstrapTable.locales['es-CL'] = {
    formatLoadingMessage: function() {
      return 'Cargando, espere por favor...';
    },
    formatRecordsPerPage: function(pageNumber) {
      return pageNumber + ' filas por p\u00E1gina';
    },
    formatShowingRows: function(pageFrom, pageTo, totalRows) {
      return 'Mostrando ' + pageFrom + ' a ' + pageTo + ' de ' + totalRows + ' filas';
    },
    formatSearch: function() {
      return 'Buscar';
    },
    formatNoMatches: function() {
      return 'No se encontraron registros';
    },
    formatPaginationSwitch: function() {
      return 'Ocultar/Mostrar paginaci\u00F3n';
    },
    formatRefresh: function() {
      return 'Refrescar';
    },
    formatToggle: function() {
      return 'Cambiar';
    },
    formatColumns: function() {
      return 'Columnas';
    },
    formatAllRows: function() {
      return 'Todo';
    }
  };

  $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['es-CL']);

})(jQuery);

/**
 * Bootstrap Table Spanish (Costa Rica) translation
 * Author: Dennis Hernández (http://djhvscf.github.io/Blog/)
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['es-CR'] = {
        formatLoadingMessage: function () {
            return 'Cargando, por favor espere...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' registros por página';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Mostrando de ' + pageFrom + ' a ' + pageTo + ' registros de ' + totalRows + ' registros en total';
        },
        formatSearch: function () {
            return 'Buscar';
        },
        formatNoMatches: function () {
            return 'No se encontraron registros';
        },
        formatRefresh: function () {
            return 'Refrescar';
        },
        formatToggle: function () {
            return 'Alternar';
        },
        formatColumns: function () {
            return 'Columnas';
        },
        formatAllRows: function () {
            return 'Todo';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['es-CR']);

})(jQuery);

/**
 * Bootstrap Table Spanish Spain translation
 * Author: Marc Pina<iwalkalone69@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['es-ES'] = {
        formatLoadingMessage: function () {
            return 'Por favor espere...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' resultados por página';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Mostrando desde ' + pageFrom + ' hasta ' + pageTo + ' - En total ' + totalRows + ' resultados';
        },
        formatSearch: function () {
            return 'Buscar';
        },
        formatNoMatches: function () {
            return 'No se encontraron resultados';
        },
        formatPaginationSwitch: function () {
            return 'Ocultar/Mostrar paginación';
        },
        formatRefresh: function () {
            return 'Refrescar';
        },
        formatToggle: function () {
            return 'Ocultar/Mostrar';
        },
        formatColumns: function () {
            return 'Columnas';
        },
        formatAllRows: function () {
            return 'Todos';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['es-ES']);

})(jQuery);

/**
 * Bootstrap Table Spanish (México) translation (Obtenido de traducción de Argentina)
 * Author: Felix Vera (felix.vera@gmail.com) 
 * Copiado: Mauricio Vera (mauricioa.vera@gmail.com)
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['es-MX'] = {
        formatLoadingMessage: function () {
            return 'Cargando, espere por favor...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' registros por página';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Mostrando ' + pageFrom + ' a ' + pageTo + ' de ' + totalRows + ' filas';
        },
        formatSearch: function () {
            return 'Buscar';
        },
        formatNoMatches: function () {
            return 'No se encontraron registros';
        },
        formatAllRows: function () {
            return 'Todo';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['es-MX']);

})(jQuery);

/**
 * Bootstrap Table Spanish (Nicaragua) translation
 * Author: Dennis Hernández (http://djhvscf.github.io/Blog/)
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['es-NI'] = {
        formatLoadingMessage: function () {
            return 'Cargando, por favor espere...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' registros por página';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Mostrando de ' + pageFrom + ' a ' + pageTo + ' registros de ' + totalRows + ' registros en total';
        },
        formatSearch: function () {
            return 'Buscar';
        },
        formatNoMatches: function () {
            return 'No se encontraron registros';
        },
        formatRefresh: function () {
            return 'Refrescar';
        },
        formatToggle: function () {
            return 'Alternar';
        },
        formatColumns: function () {
            return 'Columnas';
        },
        formatAllRows: function () {
            return 'Todo';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['es-NI']);

})(jQuery);

/**
 * Bootstrap Table Spanish (Espa?a) translation
 * Author: Antonio Pérez <anpegar@gmail.com>
 */
 (function ($) {
    'use strict';
    
    $.fn.bootstrapTable.locales['es-SP'] = {
        formatLoadingMessage: function () {
            return 'Cargando, por favor espera...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' registros por p&#225;gina.';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return pageFrom + ' - ' + pageTo + ' de ' + totalRows + ' registros.';
        },
        formatSearch: function () {
            return 'Buscar';
        },
        formatNoMatches: function () {
            return 'No se han encontrado registros.';
        },
        formatRefresh: function () {
            return 'Actualizar';
        },
        formatToggle: function () {
            return 'Alternar';
        },
        formatColumns: function () {
            return 'Columnas';
        },
        formatAllRows: function () {
            return 'Todo';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['es-SP']);

})(jQuery);
/**
 * Bootstrap Table Estonian translation
 * Author: kristjan@logist.it>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['et-EE'] = {
        formatLoadingMessage: function () {
            return 'P?ring k?ib, palun oota...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' rida lehe kohta';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'N?itan tulemusi ' + pageFrom + ' kuni ' + pageTo + ' - kokku ' + totalRows + ' tulemust';
        },
        formatSearch: function () {
            return 'Otsi';
        },
        formatNoMatches: function () {
            return 'P?ringu tingimustele ei vastanud ühtegi tulemust';
        },
        formatPaginationSwitch: function () {
            return 'N?ita/Peida lehtedeks jagamine';
        },
        formatRefresh: function () {
            return 'V?rskenda';
        },
        formatToggle: function () {
            return 'Lülita';
        },
        formatColumns: function () {
            return 'Veerud';
        },
        formatAllRows: function () {
            return 'K?ik';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['et-EE']);

})(jQuery);
/**
 * Bootstrap Table Persian translation
 * Author: MJ Vakili <mjv.1989@Gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['fa-IR'] = {
        formatLoadingMessage: function () {
            return '?? ??? ????????, ???? ??? ????...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' ????? ?? ????';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return '????? ' + pageFrom + ' ?? ' + pageTo + ' ?? ' + totalRows + ' ????';
        },
        formatSearch: function () {
            return '?????';
        },
        formatNoMatches: function () {
            return '?????? ???? ???.';
        },
        formatPaginationSwitch: function () {
            return '?????/???? ???? ????';
        },
        formatRefresh: function () {
            return '?? ??? ?????';
        },
        formatToggle: function () {
            return '????? ?????';
        },
        formatColumns: function () {
            return '??? ??';
        },
        formatAllRows: function () {
            return '???';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['fa-IR']);

})(jQuery);
/**
 * Bootstrap Table French (Belgium) translation
 * Author: Julien Bisconti (julien.bisconti@gmail.com)
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['fr-BE'] = {
        formatLoadingMessage: function () {
            return 'Chargement en cours...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' entrées par page';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Affiche de' + pageFrom + ' à ' + pageTo + ' sur ' + totalRows + ' lignes';
        },
        formatSearch: function () {
            return 'Recherche';
        },
        formatNoMatches: function () {
            return 'Pas de fichiers trouvés';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['fr-BE']);

})(jQuery);

/**
 * Bootstrap Table French (France) translation
 * Author: Dennis Hernández (http://djhvscf.github.io/Blog/)
 * Modification: Tidalf (https://github.com/TidalfFR)
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['fr-FR'] = {
        formatLoadingMessage: function () {
            return 'Chargement en cours, patientez, s′il vous pla?t ...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' lignes par page';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Affichage des lignes ' + pageFrom + ' à ' + pageTo + ' sur ' + totalRows + ' lignes au total';
        },
        formatSearch: function () {
            return 'Rechercher';
        },
        formatNoMatches: function () {
            return 'Aucun résultat trouvé';
        },
        formatRefresh: function () {
            return 'Rafra?chir';
        },
        formatToggle: function () {
            return 'Alterner';
        },
        formatColumns: function () {
            return 'Colonnes';
        },
        formatAllRows: function () {
            return 'Tous';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['fr-FR']);

})(jQuery);

/**
 * Bootstrap Table Hebrew translation
 * Author: legshooter
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['he-IL'] = {
        formatLoadingMessage: function () {
            return '????, ?? ??????...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' ????? ?????';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return '???? ' + pageFrom + ' ?? ' + pageTo + ' ?-' + totalRows + ' ?????';
        },
        formatSearch: function () {
            return '?????';
        },
        formatNoMatches: function () {
            return '?? ????? ?????? ??????';
        },
        formatPaginationSwitch: function () {
            return '????/??? ????? ????';
        },
        formatRefresh: function () {
            return '????';
        },
        formatToggle: function () {
            return '???? ?????';
        },
        formatColumns: function () {
            return '??????';
        },
        formatAllRows: function () {
            return '???';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['he-IL']);

})(jQuery);

/**
 * Bootstrap Table Croatian translation
 * Author: Petra ?trbenac (petra.strbenac@gmail.com)
 * Author: Petra ?trbenac (petra.strbenac@gmail.com)
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['hr-HR'] = {
        formatLoadingMessage: function () {
            return 'Molimo pri?ekajte ...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' broj zapisa po stranici';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Prikazujem ' + pageFrom + '. - ' + pageTo + '. od ukupnog broja zapisa ' + totalRows;
        },
        formatSearch: function () {
            return 'Pretra?i';
        },
        formatNoMatches: function () {
            return 'Nije prona?en niti jedan zapis';
        },
        formatPaginationSwitch: function () {
            return 'Prika?i/sakrij stranice';
        },
        formatRefresh: function () {
            return 'Osvje?i';
        },
        formatToggle: function () {
            return 'Promijeni prikaz';
        },
        formatColumns: function () {
            return 'Kolone';
        },
        formatAllRows: function () {
            return 'Sve';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['hr-HR']);

})(jQuery);

/**
 * Bootstrap Table Hungarian translation
 * Author: Nagy Gergely <info@nagygergely.eu>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['hu-HU'] = {
        formatLoadingMessage: function () {
            return 'Bet?ltés, kérem várjon...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' rekord per oldal';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Megjelenítve ' + pageFrom + ' - ' + pageTo + ' / ' + totalRows + ' ?sszesen';
        },
        formatSearch: function () {
            return 'Keresés';
        },
        formatNoMatches: function () {
            return 'Nincs találat';
        },
        formatPaginationSwitch: function () {
            return 'Lapozó elrejtése/megjelenítése';
        },
        formatRefresh: function () {
            return 'Frissítés';
        },
        formatToggle: function () {
            return '?sszecsuk/Kinyit';
        },
        formatColumns: function () {
            return 'Oszlopok';
        },
        formatAllRows: function () {
            return '?sszes';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['hu-HU']);

})(jQuery);

/**
 * Bootstrap Table Indonesian translation
 * Author: Andre Gardiner<andre@sirdre.com> 
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['id-ID'] = {
        formatLoadingMessage: function () {
            return 'Memuat, mohon tunggu...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' baris per halaman';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Menampilkan ' + pageFrom + ' sampai ' + pageTo + ' dari ' + totalRows + ' baris';
        }, 
        formatSearch: function () {
            return 'Pencarian';
        },
        formatNoMatches: function () {
            return 'Tidak ditemukan data yang cocok';
        },
        formatPaginationSwitch: function () {
            return 'Sembunyikan/Tampilkan halaman';
        },
        formatRefresh: function () {
            return 'Muat ulang';
        },
        formatToggle: function () {
            return 'Beralih';
        },
        formatColumns: function () {
            return 'kolom';
        },
        formatAllRows: function () {
            return 'Semua';
        },
        formatExport: function () {
            return 'Ekspor data';
        },
        formatClearFilters: function () {
            return 'Bersihkan filter';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['id-ID']);

})(jQuery);

/**
 * Bootstrap Table Italian translation
 * Author: Davide Renzi<davide.renzi@gmail.com>
 * Author: Davide Borsatto <davide.borsatto@gmail.com>
 * Author: Alessio Felicioni <alessio.felicioni@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['it-IT'] = {
        formatLoadingMessage: function () {
            return 'Caricamento in corso...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' elementi per pagina';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Elementi mostrati da ' + pageFrom + ' a ' + pageTo + ' (Numero totali di elementi ' + totalRows + ')';
        },
        formatSearch: function () {
            return 'Cerca';
        },
        formatNoMatches: function () {
            return 'Nessun elemento trovato';
        },
        formatPaginationSwitch: function () {
            return 'Nascondi/Mostra paginazione';
        },
        formatRefresh: function () {
            return 'Aggiorna';
        },
        formatToggle: function () {
            return 'Attiva/Disattiva';
        },
        formatColumns: function () {
            return 'Colonne';
        },
        formatAllRows: function () {
            return 'Tutto';
        },
        formatExport: function () {
            return 'Esporta dati';
        },
        formatClearFilters: function () {
            return 'Pulisci filtri';
        }
        
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['it-IT']);

})(jQuery);

/**
 * Bootstrap Table Japanese translation
 * Author: Azamshul Azizy <azamshul@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['ja-JP'] = {
        formatLoadingMessage: function () {
            return '読み込み中です。少々お待ちください。';
        },
        formatRecordsPerPage: function (pageNumber) {
            return 'ページ当たり最大' + pageNumber + '件';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return '全' + totalRows + '件から、'+ pageFrom + 'から' + pageTo + '件目まで表示しています';
        },
        formatSearch: function () {
            return '検索';
        },
        formatNoMatches: function () {
            return '該当するレコードが見つかりません';
        },
        formatPaginationSwitch: function () {
            return 'ページ数を表示?非表示';
        },
        formatRefresh: function () {
            return '更新';
        },
        formatToggle: function () {
            return 'トグル';
        },
        formatColumns: function () {
            return '列';
        },
        formatAllRows: function () {
            return 'すべて';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['ja-JP']);

})(jQuery);
/**
 * Bootstrap Table Georgian translation
 * Author: Levan Lotuashvili <l.lotuashvili@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['ka-GE'] = {
        formatLoadingMessage: function() {
            return '?????????, ?????? ????????...';
        },
        formatRecordsPerPage: function(pageNumber) {
            return pageNumber + ' ???????? ???? ???????';
        },
        formatShowingRows: function(pageFrom, pageTo, totalRows) {
            return '?????????? ' + pageFrom + '-??? ' + pageTo + '-??? ???????? ?????? ' + totalRows + '-???';
        },
        formatSearch: function() {
            return '?????';
        },
        formatNoMatches: function() {
            return '?????????? ?? ????';
        },
        formatPaginationSwitch: function() {
            return '????????? ???????????? ???????/????????';
        },
        formatRefresh: function() {
            return '?????????';
        },
        formatToggle: function() {
            return '??????/????????';
        },
        formatColumns: function() {
            return '???????';
        }
    };
    
    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['ka-GE']);

})(jQuery);

/**
 * Bootstrap Table Korean translation
 * Author: Yi Tae-Hyeong (jsonobject@gmail.com)
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['ko-KR'] = {
        formatLoadingMessage: function () {
            return '???? ???? ????...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return '??? ? ' + pageNumber + '? ??? ??';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return '?? ' + totalRows + '? ? ' + pageFrom + '~' + pageTo + '?? ??? ??,';
        },
        formatSearch: function () {
            return '??';
        },
        formatNoMatches: function () {
            return '??? ???? ????.';
        },
        formatRefresh: function () {
            return '?? ??';
        },
        formatToggle: function () {
            return '??';
        },
        formatColumns: function () {
            return '?? ???';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['ko-KR']);

})(jQuery);
/**
 * Bootstrap Table Malay translation
 * Author: Azamshul Azizy <azamshul@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['ms-MY'] = {
        formatLoadingMessage: function () {
            return 'Permintaan sedang dimuatkan. Sila tunggu sebentar...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' rekod setiap muka surat';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Sedang memaparkan rekod ' + pageFrom + ' hingga ' + pageTo + ' daripada jumlah ' + totalRows + ' rekod';
        },
        formatSearch: function () {
            return 'Cari';
        },
        formatNoMatches: function () {
            return 'Tiada rekod yang menyamai permintaan';
        },
        formatPaginationSwitch: function () {
            return 'Tunjuk/sembunyi muka surat';
        },
        formatRefresh: function () {
            return 'Muatsemula';
        },
        formatToggle: function () {
            return 'Tukar';
        },
        formatColumns: function () {
            return 'Lajur';
        },
        formatAllRows: function () {
            return 'Semua';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['ms-MY']);

})(jQuery);

/**
 * Bootstrap Table norwegian translation
 * Author: Jim Nordb?, jim@nordb.no
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['nb-NO'] = {
        formatLoadingMessage: function () {
            return 'Oppdaterer, vennligst vent...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' poster pr side';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Viser ' + pageFrom + ' til ' + pageTo + ' av ' + totalRows + ' rekker';
        },
        formatSearch: function () {
            return 'S?k';
        },
        formatNoMatches: function () {
            return 'Ingen poster funnet';
        },
        formatRefresh: function () {
            return 'Oppdater';
        },
        formatToggle: function () {
            return 'Endre';
        },
        formatColumns: function () {
            return 'Kolonner';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['nb-NO']);

})(jQuery);
/**
 * Bootstrap Table Dutch translation
 * Author: Your Name <info@a2hankes.nl>
 */
(function($) {
    'use strict';

    $.fn.bootstrapTable.locales['nl-NL'] = {
        formatLoadingMessage: function() {
            return 'Laden, even geduld...';
        },
        formatRecordsPerPage: function(pageNumber) {
            return pageNumber + ' records per pagina';
        },
        formatShowingRows: function(pageFrom, pageTo, totalRows) {
            return 'Toon ' + pageFrom + ' tot ' + pageTo + ' van ' + totalRows + ' record' + ((totalRows > 1) ? 's' : '');
        },
        formatDetailPagination: function(totalRows) {
            return 'Toon ' + totalRows + ' record' + ((totalRows > 1) ? 's' : '');
        },
        formatSearch: function() {
            return 'Zoeken';
        },
        formatNoMatches: function() {
            return 'Geen resultaten gevonden';
        },
        formatRefresh: function() {
            return 'Vernieuwen';
        },
        formatToggle: function() {
            return 'Omschakelen';
        },
        formatColumns: function() {
            return 'Kolommen';
        },
        formatAllRows: function() {
            return 'Alle';
        },
        formatPaginationSwitch: function() {
            return 'Verberg/Toon paginatie';
        },
        formatExport: function() {
            return 'Exporteer data';
        },
        formatClearFilters: function() {
            return 'Verwijder filters';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['nl-NL']);

})(jQuery);

/**
 * Bootstrap Table Polish translation
 * Author: zergu <michal.zagdan @ gmail com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['pl-PL'] = {
        formatLoadingMessage: function () {
            return '?adowanie, prosz? czeka?...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' rekordów na stron?';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Wy?wietlanie rekordów od ' + pageFrom + ' do ' + pageTo + ' z ' + totalRows;
        },
        formatSearch: function () {
            return 'Szukaj';
        },
        formatNoMatches: function () {
            return 'Niestety, nic nie znaleziono';
        },
        formatRefresh: function () {
            return 'Od?wie?';
        },
        formatToggle: function () {
            return 'Prze??cz';
        },
        formatColumns: function () {
            return 'Kolumny';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['pl-PL']);

})(jQuery);

/**
 * Bootstrap Table Brazilian Portuguese Translation
 * Author: Eduardo Cerqueira<egcerqueira@gmail.com>
 * Update: Jo?o Mello<jmello@hotmail.com.br>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['pt-BR'] = {
        formatLoadingMessage: function () {
            return 'Carregando, aguarde...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' registros por página';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Exibindo ' + pageFrom + ' até ' + pageTo + ' de ' + totalRows + ' linhas';
        },
        formatSearch: function () { 
            return 'Pesquisar';
        },
        formatRefresh: function () { 
            return 'Recarregar';
        },
        formatToggle: function () { 
            return 'Alternar';
        },
        formatColumns: function () { 
            return 'Colunas';
        },
        formatPaginationSwitch: function () { 
            return 'Ocultar/Exibir pagina??o';
        },
        formatNoMatches: function () {
            return 'Nenhum registro encontrado';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['pt-BR']);

})(jQuery);

/**
 * Bootstrap Table Portuguese Portugal Translation
 * Author: Burnspirit<burnspirit@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['pt-PT'] = {
        formatLoadingMessage: function () {
            return 'A carregar, por favor aguarde...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' registos por p&aacute;gina';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'A mostrar ' + pageFrom + ' at&eacute; ' + pageTo + ' de ' + totalRows + ' linhas';
        },
        formatSearch: function () {
            return 'Pesquisa';
        },
        formatNoMatches: function () {
            return 'Nenhum registo encontrado';
        },
        formatPaginationSwitch: function () {
            return 'Esconder/Mostrar pagina&ccedil&atilde;o';
        },
        formatRefresh: function () {
            return 'Atualizar';
        },
        formatToggle: function () {
            return 'Alternar';
        },
        formatColumns: function () {
            return 'Colunas';
        },
        formatAllRows: function () {
            return 'Tudo';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['pt-PT']);

})(jQuery);

/**
 * Bootstrap Table Romanian translation
 * Author: cristake <cristianiosif@me.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['ro-RO'] = {
        formatLoadingMessage: function () {
            return 'Se incarca, va rugam asteptati...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' inregistrari pe pagina';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Arata de la ' + pageFrom + ' pana la ' + pageTo + ' din ' + totalRows + ' randuri';
        },
        formatSearch: function () {
            return 'Cauta';
        },
        formatNoMatches: function () {
            return 'Nu au fost gasite inregistrari';
        },
        formatPaginationSwitch: function () {
            return 'Ascunde/Arata paginatia';
        },
        formatRefresh: function () {
            return 'Reincarca';
        },
        formatToggle: function () {
            return 'Comuta';
        },
        formatColumns: function () {
            return 'Coloane';
        },
        formatAllRows: function () {
            return 'Toate';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['ro-RO']);

})(jQuery);
/**
 * Bootstrap Table Russian translation
 * Author: Dunaevsky Maxim <dunmaksim@yandex.ru>
 */
(function ($) {
    'use strict';
    $.fn.bootstrapTable.locales['ru-RU'] = {
        formatLoadingMessage: function () {
            return 'Пожалуйста, подождите, идёт загрузка...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' записей на страницу';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Записи с ' + pageFrom + ' по ' + pageTo + ' из ' + totalRows;
        },
        formatSearch: function () {
            return 'Поиск';
        },
        formatNoMatches: function () {
            return 'Ничего не найдено';
        },
        formatRefresh: function () {
            return 'Обновить';
        },
        formatToggle: function () {
            return 'Переключить';
        },
        formatColumns: function () {
            return 'Колонки';
        },
        formatClearFilters: function () {
            return 'Очистить фильтры';
        },
        formatMultipleSort: function () {
            return 'Множественная сортировка';
        },
        formatAddLevel: function () {
            return 'Добавить уровень';
        },
        formatDeleteLevel: function () {
            return 'Удалить уровень';
        },
        formatColumn: function () {
            return 'Колонка';
        },
        formatOrder: function () {
            return 'Порядок';
        },
        formatSortBy: function () {
            return 'Сортировать по';
        },
        formatThenBy: function () {
            return 'затем по';
        },
        formatSort: function () {
            return 'Сортировать';
        },
        formatCancel: function () {
            return 'Отмена';
        },
        formatDuplicateAlertTitle: function () {
            return 'Дублирование колонок!';
        },
        formatDuplicateAlertDescription: function () {
            return 'Удалите, пожалуйста, дублирующую колонку, или замените ее на другую.';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['ru-RU']);

})(jQuery);

/**
 * Bootstrap Table Slovak translation
 * Author: Jozef Dúc<jozef.d13@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['sk-SK'] = {
        formatLoadingMessage: function () {
            return 'Prosím ?akajte ...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' záznamov na stranu';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Zobrazená ' + pageFrom + '. - ' + pageTo + '. polo?ka z celkovych ' + totalRows;
        },
        formatSearch: function () {
            return 'Vyh?adávanie';
        },
        formatNoMatches: function () {
            return 'Nenájdená ?iadna vyhovujúca polo?ka';
        },
        formatRefresh: function () {
            return 'Obnovi?';
        },
        formatToggle: function () {
            return 'Prepni';
        },
        formatColumns: function () {
            return 'St?pce';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['sk-SK']);

})(jQuery);

/**
 * Bootstrap Table Swedish translation
 * Author: C Bratt <bratt@inix.se>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['sv-SE'] = {
        formatLoadingMessage: function () {
            return 'Laddar, v?nligen v?nta...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' rader per sida';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Visa ' + pageFrom + ' till ' + pageTo + ' av ' + totalRows + ' rader';
        },
        formatSearch: function () {
            return 'S?k';
        },
        formatNoMatches: function () {
            return 'Inga matchande resultat funna.';
        },
        formatRefresh: function () {
            return 'Uppdatera';
        },
        formatToggle: function () {
            return 'Skifta';
        },
        formatColumns: function () {
            return 'kolumn';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['sv-SE']);

})(jQuery);

/**
 * Bootstrap Table Thai translation
 * Author: Monchai S.<monchais@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['th-TH'] = {
        formatLoadingMessage: function () {
            return '???????????????, ??????????????...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' ?????????????';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return '????????? ' + pageFrom + ' ??? ' + pageTo + ' ?????????? ' + totalRows + ' ??????';
        },
        formatSearch: function () {
            return '?????';
        },
        formatNoMatches: function () {
            return '??????????????????? !';
        },
        formatRefresh: function () {
            return '??????';
        },
        formatToggle: function () {
            return '??????????';
        },
        formatColumns: function () {
            return '???????';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['th-TH']);

})(jQuery);

/**
 * Bootstrap Table Turkish translation
 * Author: Emin ?en
 * Author: Sercan Cakir <srcnckr@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['tr-TR'] = {
        formatLoadingMessage: function () {
            return 'Yükleniyor, lütfen bekleyin...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return 'Sayfa ba??na ' + pageNumber + ' kay?t.';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return totalRows + ' kay?ttan ' + pageFrom + '-' + pageTo + ' aras? g?steriliyor.';
        },
        formatSearch: function () {
            return 'Ara';
        },
        formatNoMatches: function () {
            return 'E?le?en kay?t bulunamad?.';
        },
        formatRefresh: function () {
            return 'Yenile';
        },
        formatToggle: function () {
            return 'De?i?tir';
        },
        formatColumns: function () {
            return 'Sütunlar';
        },
        formatAllRows: function () {
            return 'Tüm Sat?rlar';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['tr-TR']);

})(jQuery);

/**
 * Bootstrap Table Ukrainian translation
 * Author: Vitaliy Timchenko <vitaliy.timchenko@gmail.com>
 */
 (function ($) {
    'use strict';
    
    $.fn.bootstrapTable.locales['uk-UA'] = {
        formatLoadingMessage: function () {
            return 'Завантаження, будь ласка, зачекайте...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' запис?в на стор?нку';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Показано з ' + pageFrom + ' по ' + pageTo + '. Всього: ' + totalRows;
        },
        formatSearch: function () {
            return 'Пошук';
        },
        formatNoMatches: function () {
            return 'Не знайдено жодного запису';
        },
        formatRefresh: function () {
            return 'Оновити';
        },
        formatToggle: function () {
            return 'Зм?нити';
        },
        formatColumns: function () {
            return 'Стовпц?';
        },
        formatClearFilters: function () {
            return 'Очистити ф?льтри';
        },
        formatMultipleSort: function () {
            return 'Сортування за к?лькома стовпцями';
        },
        formatAddLevel: function () {
            return 'Додати р?вень';
        },
        formatDeleteLevel: function () {
            return 'Видалити р?вень';
        },
        formatColumn: function () {
            return 'Стовпець';
        },
        formatOrder: function () {
            return 'Порядок';
        },
        formatSortBy: function () {
            return 'Сортувати за';
        },
        formatThenBy: function () {
            return 'пот?м за';
        },
        formatSort: function () {
            return 'Сортувати';
        },
        formatCancel: function () {
            return 'Скасувати';
        },
        formatDuplicateAlertTitle: function () {
            return 'Дублювання стовпц?в!';
        },
        formatDuplicateAlertDescription: function () {
            return 'Видал?ть, будь ласка, дублюючий стовпець, або зам?н?ть його на ?нший.';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['uk-UA']);

})(jQuery);

/**
 * Bootstrap Table Urdu translation
 * Author: Malik <me@malikrizwan.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['ur-PK'] = {
        formatLoadingMessage: function () {
            return '???? ??????? ?????? ?????';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' ??????? ?? ??? ';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return '?????? ' + pageFrom + ' ?? ' + pageTo + ' ?? ' +  totalRows + '???????';
        },
        formatSearch: function () {
            return '????';
        },
        formatNoMatches: function () {
            return '???? ?????? ???? ???';
        },
        formatRefresh: function () {
            return '???? ????';
        },
        formatToggle: function () {
            return '????? ????';
        },
        formatColumns: function () {
            return '????';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['ur-PK']);

})(jQuery);

/**
 * Bootstrap Table Uzbek translation
 * Author: Nabijon Masharipov <mnabijonz@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['uz-Latn-UZ'] = {
        formatLoadingMessage: function () {
            return 'Yuklanyapti, iltimos kuting...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' qator har sahifada';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Ko\'rsatypati ' + pageFrom + ' dan ' + pageTo + ' gacha ' + totalRows + ' qatorlarni';
        },
        formatSearch: function () {
            return 'Qidirish';
        },
        formatNoMatches: function () {
            return 'Hech narsa topilmadi';
        },
        formatPaginationSwitch: function () {
            return 'Sahifalashni yashirish/ko\'rsatish';
        },
        formatRefresh: function () {
            return 'Yangilash';
        },
        formatToggle: function () {
            return 'Ko\'rinish';
        },
        formatColumns: function () {
            return 'Ustunlar';
        },
        formatAllRows: function () {
            return 'Hammasi';
        },
        formatExport: function () {
            return 'Eksport';
        },
        formatClearFilters: function () {
            return 'Filtrlarni tozalash';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['uz-Latn-UZ']);

})(jQuery);

/**
 * Bootstrap Table Vietnamese translation
 * Author: Duc N. PHAM <pngduc@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['vi-VN'] = {
        formatLoadingMessage: function () {
            return '?ang t?i...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' b?n ghi m?i trang';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Hi?n th? t? trang ' + pageFrom + ' ??n ' + pageTo + ' c?a ' + totalRows + ' b?ng ghi';
        },
        formatSearch: function () {
            return 'Tìm ki?m';
        },
        formatNoMatches: function () {
            return 'Kh?ng có d? li?u';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['vi-VN']);

})(jQuery);
/**
 * Bootstrap Table Chinese translation
 * Author: Zhixin Wen<wenzhixin2010@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['zh-CN'] = {
        formatLoadingMessage: function () {
            return '正在努力地加载数据中，请稍候……';
        },
        formatRecordsPerPage: function (pageNumber) {
            return '每页显示 ' + pageNumber + ' 条记录';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return '显示第 ' + pageFrom + ' 到第 ' + pageTo + ' 条记录，总共 ' + totalRows + ' 条记录';
        },
        formatSearch: function () {
            return '搜索';
        },
        formatNoMatches: function () {
            return '没有找到匹配的记录';
        },
        formatPaginationSwitch: function () {
            return '隐藏/显示分页';
        },
        formatRefresh: function () {
            return '刷新';
        },
        formatToggle: function () {
            return '切换';
        },
        formatColumns: function () {
            return '列';
        },
        formatExport: function () {
            return '导出数据';
        },
        formatClearFilters: function () {
            return '清空过滤';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['zh-CN']);

})(jQuery);

