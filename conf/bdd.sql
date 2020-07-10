#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: CATEGORY
#------------------------------------------------------------

CREATE TABLE CATEGORY(
        id_category Int  Auto_increment  NOT NULL ,
        name        Varchar (250) NOT NULL
	,CONSTRAINT CATEGORY_PK PRIMARY KEY (id_category)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: BRAND
#------------------------------------------------------------

CREATE TABLE BRAND(
        id_brand    Int  Auto_increment  NOT NULL ,
        name        Varchar (250) NOT NULL ,
        description Varchar (50) NOT NULL
	,CONSTRAINT BRAND_PK PRIMARY KEY (id_brand)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ITEM
#------------------------------------------------------------

CREATE TABLE ITEM(
        id_item     Int  Auto_increment  NOT NULL ,
        name        Varchar (250) NOT NULL ,
        description Varchar (250) NOT NULL ,
        prix        Float NOT NULL ,
        id_category Int NOT NULL ,
        id_brand    Int NOT NULL
	,CONSTRAINT ITEM_PK PRIMARY KEY (id_item)

	,CONSTRAINT ITEM_CATEGORY_FK FOREIGN KEY (id_category) REFERENCES CATEGORY(id_category)
	,CONSTRAINT ITEM_BRAND0_FK FOREIGN KEY (id_brand) REFERENCES BRAND(id_brand)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PHOTO
#------------------------------------------------------------

CREATE TABLE PHOTO(
        id_photo Int  Auto_increment  NOT NULL ,
        name     Varchar (250) NOT NULL ,
        alt      Varchar (50) NOT NULL ,
        id_item  Int NOT NULL
	,CONSTRAINT PHOTO_PK PRIMARY KEY (id_photo)

	,CONSTRAINT PHOTO_ITEM_FK FOREIGN KEY (id_item) REFERENCES ITEM(id_item)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PHOTO
#------------------------------------------------------------

CREATE TABLE ADMINS(
        id_admin Int  Auto_increment  NOT NULL ,
        name     Varchar (250) NOT NULL ,
        email  Varchar (250) NOT NULL ,
        password Varchar (250) NOT NULL ,

)ENGINE=InnoDB;

