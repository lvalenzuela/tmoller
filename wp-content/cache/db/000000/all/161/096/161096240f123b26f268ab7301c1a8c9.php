e�xT<?php exit; ?>a:6:{s:10:"last_error";s:0:"";s:10:"last_query";s:612:"
                SELECT t.translation_id, t.language_code, t.element_id, t.source_language_code IS NULL AS original , tm.name, tm.term_id, COUNT(tr.object_id) AS instances
                FROM wp_icl_translations t
                      LEFT JOIN wp_term_taxonomy tt ON t.element_id=tt.term_taxonomy_id
                              LEFT JOIN wp_terms tm ON tt.term_id = tm.term_id
                              LEFT JOIN wp_term_relationships tr ON tr.term_taxonomy_id=tt.term_taxonomy_id
                              
                WHERE 1  AND t.trid='1391'
                GROUP BY tm.term_id
            ";s:11:"last_result";a:2:{i:0;O:8:"stdClass":7:{s:14:"translation_id";s:2:"84";s:13:"language_code";s:2:"en";s:10:"element_id";s:1:"4";s:8:"original";s:1:"1";s:4:"name";s:12:"Publications";s:7:"term_id";s:1:"4";s:9:"instances";s:1:"4";}i:1;O:8:"stdClass":7:{s:14:"translation_id";s:3:"676";s:13:"language_code";s:2:"es";s:10:"element_id";s:3:"106";s:8:"original";s:1:"0";s:4:"name";s:13:"Publicaciones";s:7:"term_id";s:3:"103";s:9:"instances";s:1:"4";}}s:8:"col_info";a:7:{i:0;O:8:"stdClass":13:{s:4:"name";s:14:"translation_id";s:5:"table";s:1:"t";s:3:"def";s:0:"";s:10:"max_length";i:3;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:1;O:8:"stdClass":13:{s:4:"name";s:13:"language_code";s:5:"table";s:1:"t";s:3:"def";s:0:"";s:10:"max_length";i:2;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:0;s:4:"type";s:6:"string";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:2;O:8:"stdClass":13:{s:4:"name";s:10:"element_id";s:5:"table";s:1:"t";s:3:"def";s:0:"";s:10:"max_length";i:3;s:8:"not_null";i:0;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:3;O:8:"stdClass":13:{s:4:"name";s:8:"original";s:5:"table";s:0:"";s:3:"def";s:0:"";s:10:"max_length";i:1;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:4;O:8:"stdClass":13:{s:4:"name";s:4:"name";s:5:"table";s:2:"tm";s:3:"def";s:0:"";s:10:"max_length";i:13;s:8:"not_null";i:0;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:0;s:4:"type";s:6:"string";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:5;O:8:"stdClass":13:{s:4:"name";s:7:"term_id";s:5:"table";s:2:"tm";s:3:"def";s:0:"";s:10:"max_length";i:3;s:8:"not_null";i:0;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:1;s:8:"zerofill";i:0;}i:6;O:8:"stdClass":13:{s:4:"name";s:9:"instances";s:5:"table";s:0:"";s:3:"def";s:0:"";s:10:"max_length";i:1;s:8:"not_null";i:1;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:1;s:4:"blob";i:0;s:4:"type";s:3:"int";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}}s:8:"num_rows";i:2;s:10:"return_val";i:2;}