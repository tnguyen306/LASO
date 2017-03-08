/*Each additional index should match a search.*/

/*Fulltext on bill text*/
alter table Bill add fulltext Text;

/*Fulltext on document text*/
alter table Document add fulltext Text;
