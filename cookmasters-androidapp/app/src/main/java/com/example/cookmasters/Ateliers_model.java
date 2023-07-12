package com.example.cookmasters;

public class Ateliers_model {
    private String title;
    private String startHour;
    private String endHour;
    private String description;
    private String duration;
    private String photoUrl;
    private String roomId;
    private String contact;

    public Ateliers_model(String title, String startHour, String endHour, String description, String duration, String photoUrl, String roomId, String contact) {
        this.title = title;
        this.startHour = startHour;
        this.endHour = endHour;
        this.description = description;
        this.duration = duration;
        this.photoUrl = photoUrl;
        this.roomId = roomId;
        this.contact = contact;
    }

    public String getTitle() {
        return title;
    }

    public String getStartHour() {
        return startHour;
    }

    public String getEndHour() {
        return endHour;
    }

    public String getDescription() {
        return description;
    }

    public String getDuration() {
        return duration;
    }

    public String getPhotoUrl() {
        return photoUrl;
    }

    public String getRoomId() {
        return roomId;
    }

    public String getContact() {
        return contact;
    }
}
