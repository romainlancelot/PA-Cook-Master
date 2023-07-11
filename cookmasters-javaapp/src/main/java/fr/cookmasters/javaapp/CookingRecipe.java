package fr.cookmasters.javaapp;

import javafx.beans.property.SimpleIntegerProperty;
import javafx.beans.property.SimpleStringProperty;

public class CookingRecipe {
    private SimpleStringProperty name;
    private SimpleStringProperty description;
    private SimpleIntegerProperty cooking_time;
    private SimpleIntegerProperty difficulty;
    private SimpleIntegerProperty people;
    private SimpleStringProperty rating;
    private SimpleIntegerProperty nbOrdered;


    public CookingRecipe(
        String name,
        String description,
        Integer cooking_time,
        Integer difficulty,
        Integer people,
        String rating,
        Integer nbOrdered
    ) {
        this.name = new SimpleStringProperty(name);
        this.description = new SimpleStringProperty(description);
        this.cooking_time = new SimpleIntegerProperty(cooking_time);
        this.difficulty = new SimpleIntegerProperty(difficulty);
        this.people = new SimpleIntegerProperty(people);
        this.rating = rating == null ? new SimpleStringProperty("Unrated") : new SimpleStringProperty(rating.toString());
        this.nbOrdered = new SimpleIntegerProperty(nbOrdered);
    }

    public int getNbOrdered() {
        return nbOrdered.get();
    }

    public SimpleIntegerProperty nbOrderedProperty() {
        return nbOrdered;
    }

    public void setNbOrdered(int nbOrdered) {
        this.nbOrdered.set(nbOrdered);
    }

    public String getName() {
        return name.get();
    }

    public SimpleStringProperty nameProperty() {
        return name;
    }

    public String getDescription() {
        return description.get();
    }

    public SimpleStringProperty descriptionProperty() {
        return description;
    }

    public int getPeople() {
        return people.get();
    }

    public SimpleIntegerProperty peopleProperty() {
        return people;
    }

    public int getCooking_time() {
        return cooking_time.get();
    }

    public SimpleIntegerProperty cooking_timeProperty() {
        return cooking_time;
    }

    public int getDifficulty() {
        return difficulty.get();
    }

    public SimpleIntegerProperty difficultyProperty() {
        return difficulty;
    }

    public String getRating() {
        return rating.get();
    }

    public SimpleStringProperty ratingProperty() {
        return rating;
    }


    public void setName(String name) {
        this.name.set(name);
    }

    public void setDescription(String description) {
        this.description.set(description);
    }

    public void setPeople(int people) {
        this.people.set(people);
    }

    public void setCooking_time(int cooking_time) {
        this.cooking_time.set(cooking_time);
    }

    public void setDifficulty(int difficulty) {
        this.difficulty.set(difficulty);
    }

    public void setRating(String rating) {
        this.rating.set(rating);
    }
}
