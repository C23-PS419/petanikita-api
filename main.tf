terraform {
    required_providers {
        google = {
            source = "hashicorp/google"
            version = "4.51.0"
        }
    }
}

provider "google" {
    project = "petanikita-capstone"
    region = "us-central1"
    zone = "us-central1-f"
}

resource "google_compute_instance" "default" {
    machine_type = "e2-micro"
    name         = "dev"

    boot_disk {
        initialize_params {
            image = "ubuntu-os-cloud/ubuntu-2004-lts"
        }
    }

    network_interface {
        network = "default"
    }
}
