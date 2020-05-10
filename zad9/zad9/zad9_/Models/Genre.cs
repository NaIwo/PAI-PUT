﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations;

namespace zad9_.Models
{
    public class Genre
    {
        public int Id { get; set; }
        [Required(ErrorMessage = "Name is required!")]
        [StringLength(100, ErrorMessage = "Maximal length of the name of a genre is 100 characters!")]
        public string Name { get; set; }
        public ICollection<Song> Songs { get; set; }
    }
}