package com.example.cookmasters;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;

public class Formation {
    private String name;
    private String description;
    private String difficulty;

    public Formation(String name, String description, String difficulty) {
        this.name = name;
        this.description = description;
        this.difficulty = difficulty;
    }

    // Getters et Setters
    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getDifficulty() {
        return difficulty;
    }

    public void setDifficulty(String difficulty) {
        this.difficulty = difficulty;
    }
}
