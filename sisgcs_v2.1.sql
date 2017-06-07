SELECT * FROM sgcsatatasignartarea as ata 
                                            inner join sgcspentproyectoentregable pen on ata.PENid=pen.PENid 

                                            inner join sgcsenttentregable as ent on pen.ENTid=ent.ENTid