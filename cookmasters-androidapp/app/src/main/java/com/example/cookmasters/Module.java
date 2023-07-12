package com.example.cookmasters;

public class Module {
    private String name;
    private String duration;
    private String introduction;
    private String content;
    private String description;


    public Module(String name, String duration, String introduction, String content, String description) {
        this.name = name;
        this.duration = duration;
        this.introduction = introduction;
        this.content = content;
        this.description = description;
    }

    // Getters et Setters
    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getDuration() {
        return duration;
    }

    public void setDuration(String duration) {
        this.duration = duration;
    }

    public String getIntroduction() {
        return introduction;
    }

    public void setIntroduction(String introduction) {
        this.introduction = introduction;
    }

    public String getContent() {
        return content;
    }

    public void setContent(String content) {
        this.content = content;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }
}
