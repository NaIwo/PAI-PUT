using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using zad9_.Models;

namespace zad9_.Controllers
{
    public class SongsController : Controller
    {
        // GET: Songs
        public ActionResult Index()
        {
            Song song = new Song();
            song.Name = "Igo's flow";
            song.Artist = "Clock Machine";
            song.Genre = "ROCK";
            song.Id = 1;
            return View(song);
        }
        public ActionResult Square(int id)
        {
            return Content(Math.Pow(id, 2).ToString());
        }
    }
}