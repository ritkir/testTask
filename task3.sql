select ob1.type, ob1.value from object ob1 INNER JOIN ( SELECT max(date) as date,type from object  GROUP BY type ) ob2 ON ob1.date  = ob2.date and ob1.type = ob2.type;