
/* Importar dados para o MongoDB */
catmandu import MARC --type ALEPHSEQ to MongoDB --database_name sibiusp --bag catalog < ../data/smit.seq

/* Importar dados para o MongoDB com fix */
catmandu import MARC --fix fixes.txt --type ALEPHSEQ to MongoDB --database_name sibiusp --bag catalog  < ../data/smit.seq
