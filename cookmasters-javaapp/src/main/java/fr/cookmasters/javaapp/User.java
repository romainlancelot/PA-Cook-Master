package fr.cookmasters.javaapp;

import javafx.beans.property.SimpleIntegerProperty;
import javafx.beans.property.SimpleStringProperty;


public class User {
    private SimpleIntegerProperty id;
    private SimpleStringProperty firstname;
    private SimpleStringProperty lastname;
    private SimpleStringProperty email;
    private SimpleStringProperty username;
    private SimpleStringProperty subscriptionPlanType;
    private SimpleStringProperty roleName;


    public User(
        Integer id,
        String firstname,
        String lastname,
        String email,
        String username,
        String subscriptionPlanType,
        String roleName
    ) {
        this.id = new SimpleIntegerProperty(id);
        this.firstname = new SimpleStringProperty(firstname);
        this.lastname = new SimpleStringProperty(lastname);
        this.email = new SimpleStringProperty(email);
        this.username = new SimpleStringProperty(username);
        this.subscriptionPlanType = new SimpleStringProperty(subscriptionPlanType);
        this.roleName = new SimpleStringProperty(roleName);
    }

    public int getId() {
        return id.get();
    }

    public SimpleIntegerProperty idProperty() {
        return id;
    }

    public String getFirstname() {
        return firstname.get();
    }

    public SimpleStringProperty firstnameProperty() {
        return firstname;
    }

    public String getLastname() {
        return lastname.get();
    }

    public SimpleStringProperty lastnameProperty() {
        return lastname;
    }

    public String getEmail() {
        return email.get();
    }

    public SimpleStringProperty emailProperty() {
        return email;
    }

    public String getUsername() {
        return username.get();
    }

    public SimpleStringProperty usernameProperty() {
        return username;
    }

    public String getSubscriptionPlanType() {
        return subscriptionPlanType.get();
    }

    public SimpleStringProperty subscriptionPlanTypeProperty() {
        return subscriptionPlanType;
    }

    public String getRoleName() {
        return roleName.get();
    }

    public SimpleStringProperty roleNameProperty() {
        return roleName;
    }


    public void setId(int id) {
        this.id.set(id);
    }

    public void setFirstname(String firstname) {
        this.firstname.set(firstname);
    }

    public void setLastname(String lastname) {
        this.lastname.set(lastname);
    }

    public void setEmail(String email) {
        this.email.set(email);
    }

    public void setUsername(String username) {
        this.username.set(username);
    }

    public void setSubscriptionPlanType(String subscriptionPlanType) {
        this.subscriptionPlanType.set(subscriptionPlanType);
    }

    public void setRoleName(String roleName) {
        this.roleName.set(roleName);
    }
}
