
/* Importar dados para o MongoDB */
catmandu import MARC --type ALEPHSEQ to MongoDB --database_name sibiusp --bag catalog < ../data/smit.seq

/* Importar dados para o MongoDB com fix */
catmandu import MARC --fix fixes.txt --type ALEPHSEQ to MongoDB --database_name sibiusp --bag catalog  < ../data/smit.seq

/* Criar indices */

echo 'db.catalog.createIndex({title:"text",authors:"text",type_of_material:"text"},{language_override:"pt",weights:{title: 10,authors: 9},name:"TextIndex"})' | mongo sibiusp


/* Recuperar todos os registros */
$result = $c::find();

/* Contar quantos registros tem na coleção */
$count_things = $c->count();
echo "$count_things";

// Get the users collection
$c_things = $db->things;

// Get a count of documents in the things collection
$count_things = $c_things->count();
echo "There are $count_things documents in the things collection.\n";

// How many have the boolean property set to true?
$count_things = $c_things->count(array('boolean' => true));
echo "There are $count_things true documents in the things collection.\n";

// How many have a string property set, regardless of value?
$count_things = $c_things->count(array('string' => array('$exists' => true)));
echo "There are $count_things documents with strings in the things collection.\n";

// How many have a list property with array values including "one" and "two"?
$count_things = $c_things->count(array('list' => array('$in' => array('one','two'))));
echo "There are $count_things documents with 'one' and 'two' as list array values in the things collection.\n";

// How many have a list property with array values not including 'three'?
$count_things = $c_things->count(array('list' => array('$nin' => array('three'))));
echo "There are $count_things documents not including the string 'three' in list array values in the things collection.\n";

// How many have include 'ever was' in the string property? Using a regular expression:
$regex = new MongoRegex("/ever was/");
$count_things = $c_things->count(array('string' => $regex));
echo "There are $count_things documents including the string 'ever was' in string property in the things collection.\n";
