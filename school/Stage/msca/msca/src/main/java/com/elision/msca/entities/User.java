package com.elision.msca.entities;

import net.minidev.json.annotate.JsonIgnore;

import javax.persistence.*;
import java.util.Date;

@Entity
public class Users {

    @Id
    @GeneratedValue(strategy=GenerationType.AUTO)
    private int id;
    @Column
    private String firstNaam;
    @Column
    private String lastName;
    @Column
    private String userName;
    @Column
    @JsonIgnore
    private String password;
    @Column
    private String mailAdress;
    @Column
    private Date dayOfBirth;


}
